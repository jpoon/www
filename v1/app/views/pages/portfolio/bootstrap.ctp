<?php
    echo $javascript->link('sh/shCore');
    echo $javascript->link('sh/shBrushBash');
    echo $javascript->codeBlock('SyntaxHighlighter.all()');
    echo $html->css('shCore');
    echo $html->css('shThemeDefault');
?>
<div id="portfolioCode">
    <pre class="brush: bash">
    #!/bin/bash

    # Debug=1 - Verbose Logging
    # Debug=  - Limited logging
    DEBUG=

    # Logging
    TIME=`date +%F_%H.%M.%S`
    LOGDIR="./logs"
    LOGFILE="$LOGDIR/$TIME.log"
    ACTIVE_NODES="$LOGDIR/active_nodes"

    # SSH
    SSH_KEY_PATH="id_rsa"
    SLICE_NAME="usf_ubcslice3"

    # Remote Directory
    REMOTE_HOME="/home/usf_ubcslice3"
    REMOTE_BUILD_DIR="$REMOTE_HOME/build"

    # pyFacebook
    SVN_REPO_PYFACEBOOK_PATH="pyfacebook"
    SVN_REPO_PYFACEBOOK_URL="http://pyfacebook.googlecode.com/svn/trunk/"

    # Git
    GIT_REPO_UTIL_PATH="$REMOTE_HOME/util"
    GIT_REPO_UTIL_URL="git://github.com/MTsoul/util.git"

    GIT_REPO_JOKE_PATH="$REMOTE_HOME/joke"
    GIT_REPO_JOKE_URL="git://oliverzheng.com/ubc/eece411/joke.git"

    # Python
    PYTHON_VERSION="2.6"
    PYTHON_PKG_NAME="Python-2.6.4"
    PYTHON_PKG_TYPE="tgz"
    PYTHON_URL="http://www.python.org/ftp/python/2.6.4/$PYTHON_PKG_NAME.$PYTHON_PKG_TYPE"
    PYTHON_INSTALL_PREFIX="/opt/python$PYTHON_VERSION"

    # Python Setup Tools
    SETUP_TOOLS_PKG_NAME="setuptools-0.6c11"
    SETUP_TOOLS_PKG_TYPE="tar.gz"
    SETUP_TOOLS_URL="http://pypi.python.org/packages/source/s/setuptools/$SETUP_TOOLS_PKG_NAME.$SETUP_TOOLS_PKG_TYPE"

    # Python Memcache
    MEMCACHE_PKG_NAME="python-memcached-1.45"
    MEMCACHE_PKG_TYPE="tar.gz"
    MEMCACHE_URL="ftp://ftp.tummy.com/pub/python-memcached/$MEMCACHE_PKG_NAME.$MEMCACHE_PKG_TYPE"

    # Python Twisted
    TWISTED_PKG_NAME="Twisted-8.2.0"
    TWISTED_PKG_TYPE="tar.bz2"
    TWISTED_URL="http://tmrc.mit.edu/mirror/twisted/Twisted/8.2/$TWISTED_PKG_NAME.$TWISTED_PKG_TYPE"

    # Start Server
    SERVER_LOG_FILE="$GIT_REPO_UTIL_PATH/log-start_server"
    SERVER_EXECUTABLE="start_server.py"


    #
    # $1 = node hostname/IP
    # $2 = command
    #
    function remote_exec() {
        # ssh without host key checking
        cmd="ssh -i $SSH_KEY_PATH -l $SLICE_NAME -oStrictHostKeyChecking=no $1"  
        
        if [ ! -z "$TIMEOUT" ]
        then
            cmd="$cmd -oConnectTimeout=$TIMEOUT"
        fi

        if [ "$4" == "nohup" ]
        then
            cmd="$cmd \"nohup $2 &\""
        else
            cmd="$cmd \"$2\""
        fi

        if [ ! -z "$DEBUG" ]
        then
            log $cmd
        fi
        ret=`eval $cmd 2>&1`
        ret_val=$?

        if [ $ret_val -ne 0 ]
        then
            log "Remote Execution Error: $1 with message $ret"

            # connection problem, send signal to trap
            if [ $ret_val -eq 255 ]
            then
                kill -5 $$
            else
                return 1
            fi
        fi
        echo $ret
    }

    function log() {
        echo `date +%F_%H.%M.%S` - $* >> $LOGFILE
    }

    function log_and_print() {
        echo $*
        log $*
    }

    function init() {
        dir_name=`dirname $LOGFILE`
        mkdir -pv "$dir_name" 
        touch $ACTIVE_NODES
    }

    function get_python_version() {
        ret_val=`remote_exec $1 "python -V"`

        if [ $? -ne 0 ]
        then
            echo "0"
        fi

        echo `echo $ret_val | sed 's/^.*Python //g'`
    }

    function get_os_version() {
        os_ver=`remote_exec $1 "cat /etc/fedora-release"`
        if [ $? -eq 0 ] && ! [[ "$os_ver" =~ "Fedora release 8".* ]]
        then
            log "WARNING: $1 OS is NOT Fedora 8 but $os_ver"
        fi
        log "$os_ver"
    }

    #
    # $1    Hostname
    # $2    Git Remote Repo
    # $3    Git Remote Directory
    #
    function git_clone() {
        not_exists=`remote_exec $1 "if ! [ -e '$3' ]; then echo 1; fi"`
        if [ $? -eq 0 ] && [ $not_exists ]
        then
            log "git: cloning $2"
            ret=`remote_exec $1 "cd $REMOTE_HOME; git clone $2"`
        else
            log "git: $3 has already been cloned"

            log "git: removing old $3"
            ret=`remote_exec $1 "rm -rf $3"`
            log "git: cloning $2"
            ret=`remote_exec $1 "cd ~; git clone $2"`
        fi
    }

    #
    # $1    Hostname
    # $2    Git Remote Repo
    #
    function git_pull() {
        log "git: pull $2"
        ret=`remote_exec $1 "cd $2; git pull"`
        if [ $? -ne 0 ]
        then 
            log_and_print "ERROR: unable to perform git pull $2"
        fi 
    }

    function git_submodule() {
        log "git: submodule $2"
        ret=`remote_exec $1 "cd $2; git submodule init; git submodule update;"`
        if [ $? -ne 0 ]
        then 
            log_and_print "ERROR: unable to update submodule $2"
        fi 
    }

    function install() {
        case $2 in
            python)
                upgrade_python $1
                ;;
            python-setuptools)
                install_python_package $1 $SETUP_TOOLS_PKG_NAME $SETUP_TOOLS_PKG_TYPE $SETUP_TOOLS_URL 
                ;;
            python-memcache)
                install_python_package $1 $MEMCACHE_PKG_NAME $MEMCACHE_PKG_TYPE $MEMCACHE_URL
                ;;
            python-twisted)
                install_python_package $1 $TWISTED_PKG_NAME $TWISTED_PKG_TYPE $TWISTED_URL
                ;;
            pyfacebook)
                install_pyfacebook $1
                ;;
            *)
                # Yum requires python2.5 to be default
                ver=`get_python_version $1`
                if [ ${ver:0:1} != "2" ] || [ ${ver:2:1} != "5" ]
                then
                    log "$2: symlink /usr/bin/python2.5 -> /usr/bin/python"
                    ret=`remote_exec $1 "sudo ln -sf /usr/bin/python2.5 /usr/bin/python"`
                fi

                ret=`remote_exec $1 "sudo yum install -y $2"`
                if [[ $ret == *Nothing\ to\ do* ]]
                then
                    log "$2: Already installed"
                else
                    log "$2: Installing"
                fi
                ;;
        esac
    }

    function upgrade_python() {
        ver=`get_python_version $1`

        # Default python version < $PYTHON_VERSION
        if [ "${ver:0:1}" -lt ${PYTHON_VERSION:0:1} ] || \
           { [ "${ver:0:1}" -eq ${PYTHON_VERSION:0:1} ] && [ "${ver:2:1}" -lt ${PYTHON_VERSION:2:1} ];}
        then

            # Determine if $PYTHON_VERSION has already been installed
            not_exists=`remote_exec $1 "if ! [ -e '$PYTHON_INSTALL_PREFIX/bin/python' ]; then echo 1; fi"`
            if [ $? -eq 0 ] && [ $not_exists ]
            then

                if [ "${ver:0:1}" -eq 0 ]
                then
                    log "python: Installing python$PYTHON_VERSION"
                else
                    log "python: Upgrading from $ver to $PYTHON_VERSION"
                fi

                # Download
                clean_file $1 $PYTHON_PKG_NAME.$PYTHON_PKG_TYPE
                log "python: Downloading package from $PYTHON_URL"
                download $1 $PYTHON_URL

                # Unpack
                log "python: Unpacking..."
                extract $1 $PYTHON_PKG_NAME.$PYTHON_PKG_TYPE

                # Install
                log "python: Installing..."
                ret=`remote_exec $1 "cd $REMOTE_BUILD_DIR/$PYTHON_PKG_NAME; \
                                     ./configure --prefix=$PYTHON_INSTALL_PREFIX --with-zlib=/usr/include; \
                                     make; \
                                     sudo make install;"`
                if [ $? -ne 0 ]
                then 
                    log_and_print "ERROR: unable to install python"
                fi 

                # Clean
                log "python: Clean..."
                clean_file $1 $PYTHON_PKG_NAME.$PYTHON_PKG_TYPE
            fi

            # Replace default 'python'
            log "python: symlink $PYTHON_INSTALL_PREFIX/bin/python -> /usr/bin/python"
            ret=`remote_exec $1 "sudo ln -sf $PYTHON_INSTALL_PREFIX/bin/python /usr/bin/python"`
        else
            log "python: v$PYTHON_VERSION already installed"
        fi
    }

    #
    #   $1      hostname
    #   $2      package name
    #   $3      package type
    #   $4      package download location (url)
    #
    function install_python_package() {
        # Make sure $PYTHON_VERSION is default
        upgrade_python $1

        # Download
        log "$2: Downloading from $4..."
        clean_file $1 $2.$3
        download $1 $4

        # Unpack
        log "$2: Unpacking..."
        extract $1 $2.$3

        # Install
        log "$2: Building/Installing..."
        ret=`remote_exec $1 "cd $REMOTE_BUILD_DIR/$2; \
                             sudo python setup.py install;"`
        if [ $? -ne 0 ]
        then 
            log_and_print "ERROR: unable to install $2"
        fi 

        # Clean
        log "$2: Clean..."
        clean_file $1 $2.$3
    }

    function download() {
        ret=`remote_exec $1 "mkdir -p $REMOTE_BUILD_DIR; \
                              cd $REMOTE_BUILD_DIR; \
                              wget $2;"`
        if [ $? -ne 0 ]
        then 
            log_and_print "ERROR: unable to download from $2"
        fi 
    }

    function extract() {
        case $2 in
            *.tar.bz2)   cmd="tar xvjf $2"    ;;
            *.tar.gz)    cmd="tar xvzf $2"    ;;
            *.tar)       cmd="tar xvf $2"     ;;
            *.tgz)       cmd="tar xvzf $2"    ;;
        esac

        if [ -z "${cmd+xxx}" ]
        then
            log_and_print "ERROR: Don't know how to extract $2"
            exit
        fi

        ret=`remote_exec $1 "cd $REMOTE_BUILD_DIR; \
                             ${cmd}"`
        if [ $? -ne 0 ]
        then 
            log_and_print "ERROR: unable to extract $2"
            exit
        fi 
    }


    function clean_file() {
        ret=`remote_exec $1 "cd $REMOTE_BUILD_DIR; \
                        rm -f $2;"`
    }

    function install_pyfacebook() {
        upgrade_python $1

        log "pyfacebook: Installing"
        ret=`remote_exec $1 "svn checkout $SVN_REPO_PYFACEBOOK_URL $REMOTE_BUILD_DIR/$SVN_REPO_PYFACEBOOK_PATH;"`
        ret=`remote_exec $1 "cd $REMOTE_BUILD_DIR/$SVN_REPO_PYFACEBOOK_PATH; \
                             sudo python setup.py install"`
        if [ $? -ne 0 ]
        then 
            log_and_print "ERROR: unable to install pyfacebook"
        fi 
    }

    function start_server() {
        ret=`remote_exec $1 "killall $SERVER_EXECUTABLE"`

        remote_host=`remote_exec $1 "curl -s http://checkip.dyndns.org/ | grep -o '[[:digit:].]\+'"`
        log "server: starting server on $remote_host"
        ret=`remote_exec $1 "$GIT_REPO_UTIL_PATH/$SERVER_EXECUTABLE $remote_host &> $SERVER_LOG_FILE &"`
        if [ $? -ne 0 ]
        then 
            log_and_print "ERROR: unable to start server"
            exit
        fi 
    }

    function load_node_list() {
        #check if file exists here
        n=0
        while read line
        do 
            n=$(($n+1));
            # skip commented node
            if [[ ${line:0:1} == "#" ]]
            then
                continue;
            fi
            list[n]=$line;
        done < "$1"
    }

    #
    # $1 = timeout 
    #
    if [ $# -eq 0 ]
    then
        echo "Usage: ./bootstrap.sh < [node_list_filepath] [timeout]"
        echo "       or"
        echo "       echo -e \"[hostname1]\n[hostname2]\" | ./bootstrap.sh [timeout]" 
        exit 1
    fi

    if ! [ $1 -eq $1 2>/dev/null ]
    then
        echo "Timeout must be an Integer"
        exit 1
    fi 

    F_NODELIST="/dev/stdin"
    TIMEOUT=$1
    load_node_list $F_NODELIST 

    init
    log_and_print "Starting bootstrap"
    log "Connection Timeout is set to: ${TIMEOUT}s"

    trap "continue;" 5
    start=`date +"%s"`

    # Iterate through nodes
    i=0
    for node in ${list[@]}
    do
        i=$(($i+1))
        now=`date +"%s"`
        hostname=`echo $node | sed s/,.*$//g`
        ip=`echo $node | sed s/^.*,//g`
        log_and_print "=== (${i} of ${#list[@]}) $hostname ==="

        # OS
        get_os_version $hostname

        # Python2.6 breaks yum. As a result, the installation of 
        # the packages below will fail if yum python2.6 is the 
        # default python

        install $hostname "make"
        install $hostname "gcc"
        install $hostname "git"
        install $hostname "svn"
        install $hostname "zlib"
        install $hostname "zlib-devel"

        install $hostname "python" 
        install $hostname "python-setuptools"
        install $hostname "python-memcache"
        install $hostname "python-twisted"
        install $hostname "pyfacebook"

        git_clone $hostname $GIT_REPO_JOKE_URL $GIT_REPO_JOKE_PATH
        git_pull $hostname $GIT_REPO_JOKE_PATH

        git_clone $hostname $GIT_REPO_UTIL_URL $GIT_REPO_UTIL_PATH
        git_pull $hostname $GIT_REPO_UTIL_PATH
        git_submodule $hostname $GIT_REPO_UTIL_PATH

        start_server $hostname

        then=`date +"%s"`
        log "Finished $hostname in $(($then - $now))s"
        # get this far, save this node as usable
        if [ `grep -c $hostname $ACTIVE_NODES` -eq 0 ]
        then
            echo $hostname >> $ACTIVE_NODES
        fi
    done

    end=`date +"%s"`
    log_and_print "Finished bootstrapping in $(($end - $start))s"
    </pre>
</div>
