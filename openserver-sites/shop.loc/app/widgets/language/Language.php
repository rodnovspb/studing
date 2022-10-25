<?php


namespace app\widgets\language;


use RedBeanPHP\R;
use wfm\App;

class Language
{
    protected $tpl;
    protected $languages;
    protected $language;
    
    public function __construct()
    {
        $this->tpl = __DIR__ . '/lang_tpl.php';
        $this->run();
    }
    
    protected function run() {
        $this->languages = App::$app->getProperty('languages');
        $this->language = App::$app->getProperty('language');
        echo $this->getHtml();
    }
    
    public static function getLanguages():array {
        return R::getAssoc("SELECT code, title, base, id FROM language ORDER BY base DESC");
    }
    
    public static function getLanguage($languages){
        $lang = App::$app->getProperty('lang');
        if($lang && array_key_exists($lang, $languages)){
        $key = $lang;
        } elseif(!$lang) {
            $key = key($languages);
        } else {
            $lang = h($lang);
            throw new \Exception("Язык {$lang} не найден", 404);
        }
        $lang_info = $languages[$key];
        $lang_info['code'] = $key;
        return $lang_info;
    }
    
    protected function getHtml():string {
        ob_start();
        require_once $this->tpl;
        return ob_get_clean();
    }
}


























