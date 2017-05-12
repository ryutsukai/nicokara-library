<?php
    class nicokara{
        public $search_option = array();
        public $search_information = array();
        public $search_data = array();
        public $watch_data = array();
        function set($array){
            $this->search_option = $array;
        }
        function search(){
            $data = file_get_contents("https://api.nicokara.net/search2?q={$this->search_option['q']}&vocal={$this->search_option['vocal']}&key={$this->search_option['key']}&page={$this->search_option['page']}");
            $data = json_decode($data);
            $this->search_information = $data[0][0]->information[0];
            $this->search_data = $data[0][1]->search;
        }
        function watch($smid){
            $nicoAPI = simplexml_load_file("http://ext.nicovideo.jp/api/getthumbinfo/{$smid}");
            $this->watch_data['smid'] = $smid;
            $this->watch_data['title'] = $nicoAPI->thumb->title;
            $this->watch_data['description'] = $nicoAPI->thumb->description;
            $this->watch_data['thumbnail_url'] = $nicoAPI->thumb->thumbnail_url;
        }
    }
