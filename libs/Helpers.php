<?php

namespace Cardbook\Helpers;


class Helpers
{


    public static function loader($helper)
    {
      if (method_exists(__CLASS__, $helper)) {
          return array(__CLASS__, $helper);
      }
    }


    public static function image($image,  $folder = NULL, $fallback = NULL)
    {
       
    
        $el = \Nette\Utils\Html::el('img');

        if (is_file(WWW_DIR.'/storage/images/original/'.$image))
        {
            $el->src = '/storage/images/'.$folder.'/'.$image;
        }
        elseif ($fallback)
        {
            $el->src = '/storage/images/fallback/'.$fallback;
        }
        else
        {
            $el->src = 'http://dummyimage.com/'.$folder.'/3b75cc/ced0f5.gif&text=X';
        }

        return $el;
    }    


    public static function imageToUrl($image,  $folder = NULL, $fallback = NULL)
    {
       
    
  

        if (is_file(WWW_DIR.'/storage/images/original/'.$image))
        {
            $url = '/storage/images/'.$folder.'/'.$image;
        }
        elseif ($fallback)
        {
            $url = '/storage/images/fallback/'.$fallback;
        }
        else
        {
            $url = 'http://dummyimage.com/'.$folder.'/3b75cc/ced0f5.gif&text=X';
        }

        return $url;
    }





    public static function test($s)
    {
    	return $s . "----- :))))";
    }

    public static function replaceKeyWords($text)
    {
        $before = array('/x?html ?(5)?/si', '/css ?(3?)/si', '/php ?(5)?/si', '/mysql ?(5)?/si', '/javascript/si', '/jquery/si', '/seo/si');
        $after  = array(   
                         '<a class="tag tag-html" href="http://cs.wikipedia.org/wiki/HyperText_Markup_Language">HTML$1</a>',
                         '<a class="tag tag-css" href="http://cs.wikipedia.org/wiki/Cascading_Style_Sheets">CSS$1</a>', 
                         '<a class="tag tag-php" href="http://cs.wikipedia.org/wiki/PHP">PHP$1</a>',
                         '<a class="tag tag-mysql" href="http://cs.wikipedia.org/wiki/Mysql">MySQL$1</a>', 
                         '<a class="tag tag-javascript" href="http://cs.wikipedia.org/wiki/Javascript">JavaScript</a>',
                         '<a class="tag tag-jquery" href="http://cs.wikipedia.org/wiki/JQuery">jQuery</a>',
                         '<a class="tag tag-seo" href="http://cs.wikipedia.org/wiki/Search_Engine_Optimization">SEO</a>'
                      );


        return preg_replace($before, $after, $text);
    }

}
