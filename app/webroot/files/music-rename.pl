#!/usr/bin/perl -w
$extension = ".mp3";

$titleIndex = 8;
$artistName = "Seal";
$separator = " - ";

@files = <*>;
chomp @files;
foreach $file (@files) {
    if ( $file =~ /$extension/ )
    {
        my $len_filename = length $file;
        my $len_extension = length $extension;
        
        my $title = substr($file, $titleIndex, $len_filename - $len_extension - $titleIndex);
        
        # search/replace _ with 0x20
        $title =~ s/_/ /g;
 
        $title = &string_caps_word($title);
        
        my $newName = $artistName . $separator . $title . $extension;
        
        print $file . "\n";
        print $newName . "\n";
        print "--------------------------\n";
        rename($file, $newName);
    }
   
}

sub string_caps_word {
    my($string) = @_;
    my @exception_words = ('A', 'The', 'If', 'Is', 'It', 'Of', 'Our', 'An',
                         'On', 'In', 'But', 'With', 'Has', 'Had', 'Have');
    $string =~ s/([\w']+)/\u\L$1/g;
    foreach(@exception_words){
        $string =~ s/\b$_\b/lc($_)/ge;
    }

    # Uppercase the first letter
    $string =~ s/(.)/\u$1/;
    return $string;
}

exit(0);
