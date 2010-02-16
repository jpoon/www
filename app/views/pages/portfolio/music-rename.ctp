<?php
    echo $javascript->link('sh/shCore');
    echo $javascript->link('sh/shBrushPerl');
    echo $javascript->codeBlock('SyntaxHighlighter.all()');
    echo $html->css('shCore');
    echo $html->css('shThemeDefault');
?>
<div id="portfolioCode">
    <pre class="brush: perl">
    #!/usr/bin/perl

    #
    # Author: Jason Poon
    #
    # Renames all files in the current directory to follow a similar format
    # where the renamed filename will be of the form "$artist - [song title].$extension"
    # By default the script will run in debug mode, outputting the new filename. 
    #

    sub println {
        local $\ = "\n";
        print @_;
    }

    sub usage {
        println "Usage: ./rename.pl";
        println "\t -artist [Artist Name]";
        println "\t -index [Index Value]";
        println "\t [options]";
        println "Options:";
        println "\t -ext \t File Extension";
        println "\t -r \t Run Mode";             
    }

    sub cap_word {
        my($string) = @_;
        my @exception = ('A', 'The', 'If', 'Is', 'It', 'Of', 'Our', 'An',
                             'On', 'In', 'But', 'With', 'Has', 'Had', 'Have');
        $string =~ s/([\w']+)/\u\L$1/g;
        foreach(@exception){
            $string =~ s/\b$_\b/lc($_)/ge;
        }

        # Capitalize the first letter
        $string =~ s/(.)/\u$1/;
        return $string;
    }

    my ($artistName, $titleIndex, $run);
    my $separator = " - ";
    my $extension = "mp3";

    # Parse cmd arguments
    use Getopt::Long;
    $result = GetOptions("artist=s" => \$artistName,
                         "ext=s" => \$extension,
                         "index=i" => \$titleIndex,
                         "r" => \$run);

    if (!$result or !$artistName or !$titleIndex) {
        die usage();
    }

    $extension = '.' . $extension;
    @files = <*>;
    chomp @files;
    foreach $filename (@files) {
        if ( $filename =~ /$extension/ )
        {
            my $len_filename = length $filename;
            my $len_extension = length $extension;

            my $title = substr($filename, $titleIndex, $len_filename - $len_extension - $titleIndex);
            
            # search/replace _ with 0x20
            $title =~ s/_/ /g;
            $title = &cap_word($title);
            
            my $newName = $artistName . $separator . $title . $extension;
           
            println "Old:\t" . $filename;
            println "New:\t" . $newName;
            println "--------------------------";

            if ($run) {
                rename($filename, $newName);
            }
        }
    }

    exit;
    </pre>
</div>
