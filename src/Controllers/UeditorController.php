<?php
namespace Jenson\Ueditor\Controllers;

use App\Http\Controllers\Controller;

class UeditorController extends Controller
{

    public function functions(){
        error_reporting(E_ERROR);
        header("Content-Type: text/html; charset=utf-8");

//        $CONFIG = json_decode(preg_replace("/\/\*[\s\S]+?\*\//", "", file_get_contents("config.json")), true);
        $CONFIG = json_decode(preg_replace("/\/\*[\s\S]+?\*\//", "", config('mbcore_ueditor_config')), true);
        $action = $_GET['action'];

        switch ($action) {
            case 'config':
                $result =  json_encode($CONFIG);
                break;

            /* 图片上传 */
            case 'uploadimage':
            /* �ϴ�Ϳѻ */
            case 'uploadscrawl':
            /* 上传视屏 */
            case 'uploadvideo':
            /* 文件上传 */
            case 'uploadfile':
                $result = include("action_upload.php");
                break;

            /* 图片列表 */
            case 'listimage':
            /* 文件列表 */
            case 'listfile':
                $result = include("action_list.php");
                break;

            /* 抓取图片 */
            case 'catchimage':
                $result = include("action_crawler.php");
                break;

            default:
                $result = json_encode(array(
                    'state'=> '附件上传异常'
                ));
                break;
        }

        /* 附件上传回调 */
        if (isset($_GET["callback"])) {
            if (preg_match("/^[\w_]+$/", $_GET["callback"])) {
                echo htmlspecialchars($_GET["callback"]) . '(' . $result . ')';
            } else {
                echo json_encode(array(
                    'state'=> 'callback异常'
                ));
            }
        } else {
            echo $result;
        }
    }
}
