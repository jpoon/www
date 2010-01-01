<?php 
class ListMenuHelper extends AppHelper 
{ 
    var $helpers = array('Html'); 
     
    function create($links = array(),$htmlAttributes = array(),$type = 'ul') 
    {       
        $this->tags['ul'] = '<ul%s>%s</ul>'; 
        $this->tags['ol'] = '<ol%s>%s</ol>'; 
        $this->tags['li'] = '<li%s>%s</li>';
        $out = array();         
        foreach ($links as $title => $link) 
        { 
            $title = __($title,true);
            $linkTitle = "<span>" . $title . "</span>";
            if($this->url($link) == $this->here) 
            { 
                $out[] = sprintf($this->tags['li'],' id="' . strtolower(str_replace(" ", "-",$title)) . '" class="active"',$this->Html->link($linkTitle, $link,null,null,false)); 
            } 
            else 
            { 
                $out[] = sprintf($this->tags['li'],' id="' . strtolower(str_replace(" ", "-",$title)) . '"',$this->Html->link($linkTitle, $link,null,null,false)); 
            } 
        } 
        $tmp = join("\n", $out); 
        return $this->output(sprintf($this->tags[$type],$this->_parseAttributes($htmlAttributes), $tmp)); 
    } 
}
?>
