<?php
namespace NicokaraDotNet;

/**
 * Class ApiClient
 * @package NicokaraDotNet
 */
// @todo
// とりま、元あった `nicokara-library.php` からコピペしただけ。
// アクセサの省略とか、フィールドが `public` とか、いろいろ設計的にマズイので、直す。
class ApiClient
{
    public $search_option = array();
    public $search_information = array();
    public $search_data = array();
    public $watch_data = array();

    function set($array)
    {
        $this->search_option = $array;
    }

    function search()
    {
        $data = file_get_contents(
            "https://api.nicokara.net/search2?q={$this->search_option['q']}&vocal={$this->search_option['vocal']}&key={$this->search_option['key']}&page={$this->search_option['page']}"
        );
        $data = json_decode($data);
        $this->search_information = $data[0][0]->information[0];
        $this->search_data = $data[0][1]->search;
    }

    function watch($smid)
    {
        $nicoAPI = simplexml_load_file("http://ext.nicovideo.jp/api/getthumbinfo/{$smid}");
        $this->watch_data['smid'] = $smid;
        $this->watch_data['title'] = $nicoAPI->thumb->title;
        $this->watch_data['description1'] = $nicoAPI->thumb->description;
        $nicohtml = file_get_contents("http://www.nicovideo.jp/watch/".$smid);
        $nicohtml = str_replace("http://www.nicovideo.jp/", "http://www.nicokara.net/", $nicohtml);
        preg_match_all("/description\">(.*)<\/p>/", $nicohtml, $match3);
        $desc = $match3[1][0];
        $this->watch_data['description2'] = $desc;
        $this->watch_data['thumbnail_url'] = $nicoAPI->thumb->thumbnail_url;
        $this->watch_data['first_retrieve'] = date('Y/m/d H:i', strtotime($nicoAPI->thumb->first_retrieve));
        $this->watch_data['length'] = $nicoAPI->thumb->length;
        $this->watch_data['movie_type'] = $nicoAPI->thumb->movie_type;
        $this->watch_data['size_high'] = $nicoAPI->thumb->size_high;
        $this->watch_data['size_low'] = $nicoAPI->thumb->size_low;
        $this->watch_data['view_counter'] = $nicoAPI->thumb->view_counter;
        $this->watch_data['comment_num'] = $nicoAPI->thumb->comment_num;
        $this->watch_data['mylist_counter'] = $nicoAPI->thumb->mylist_counter;
        $this->watch_data['last_res_body'] = $nicoAPI->thumb->last_res_body;
        $this->watch_data['watch_url'] = $nicoAPI->thumb->watch_url;
        $this->watch_data['thumb_type'] = $nicoAPI->thumb->thumb_type;
        $this->watch_data['embeddable'] = $nicoAPI->thumb->embeddable;
        $this->watch_data['no_live_play'] = $nicoAPI->thumb->no_live_play;
        $this->watch_data['tags'] = $nicoAPI->thumb->tags;
        $this->watch_data['user_id'] = $nicoAPI->thumb->user_id;
        $this->watch_data['user_nickname'] = $nicoAPI->thumb->user_nickname;
        $this->watch_data['user_icon_url'] = $nicoAPI->thumb->user_icon_url;
    }
}
