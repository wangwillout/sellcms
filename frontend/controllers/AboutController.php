<?php
namespace frontend\controllers;

use yii\web\Controller;
use common\models\DataItems;
use common\enums\MenuIdEnum;
use common\models\Banners;
use common\models\Partner;
use common\models\Team;
use common\models\Menu;
use common\enums\LocationEnum;

/**
 * Site controller
 */
class AboutController extends Controller
{
    /**
     * 关于我们（股权结构）
     */
    public function actionEquity()
    {
        $this->view->title = "关于我们--股权结构";
        $list = DataItems::find()->where([
                'menu_id' => MenuIdEnum::ID_ABOUT_EQUITY,
                'status' => 1,
            ])->orderBy('sort asc')->all();
        $banner = Banners::find()->where([
                'menu_id' => MenuIdEnum::ID_ABOUT_EQUITY,
                'status' => 1,
            ])->one();
        return $this->render('equity', compact('list', 'banner'));
    }

    /**
     * 关于我们（公司文化）
     */
    public function actionCulture()
    {
        $this->view->title = "关于我们--公司文化";
        $list = DataItems::find()->where([
                'menu_id' => MenuIdEnum::ID_ABOUT_CULTURE,
                'status' => 1,
            ])->orderBy('sort asc')->all();
        $banner = Banners::find()->where([
                'menu_id' => MenuIdEnum::ID_ABOUT_CULTURE,
                'status' => 1,
            ])->one();
        return $this->render('culture', compact('list', 'banner'));
    }

    /**
     * 关于我们（公司优势）
     */
    public function actionAdvantage()
    {
        $this->view->title = "关于我们--公司优势";
        $list = DataItems::find()->where([
                'menu_id' => MenuIdEnum::ID_ABOUT_ADVANTAGE,
                'status' => 1,
            ])->orderBy('sort asc')->all();
        return $this->render('advantage', compact('list'));
    }

    /**
     * 关于我们（董事长致辞）
     */
    public function actionStatement()
    {
        $this->view->title = "关于我们--董事长致辞";
        $model = DataItems::find()->where([
                'menu_id' => MenuIdEnum::ID_ABOUT_STATEMENT,
                'status' => 1,
            ])->one();
        return $this->render('statement', compact('model'));
    }

    /**
     * 关于我们（组织架构）
     */
    public function actionOrganize()
    {
        $this->view->title = "关于我们--组织架构";
        $model = DataItems::find()->where([
                'menu_id' => MenuIdEnum::ID_ABOUT_ORGANIZE,
                'status' => 1,
            ])->one();
        return $this->render('organize', compact('model'));
    }

    /**
     * 关于我们（私募牌照）
     */
    public function actionLicence()
    {
        $this->view->title = "关于我们--私募牌照";
        $model = DataItems::find()->where([
                'menu_id' => MenuIdEnum::ID_ABOUT_LICENCE,
                'status' => 1,
            ])->one();
        return $this->render('licence', compact('model'));
    }

    /**
     * 关于我们（管理团队）
     */
    public function actionTeam() {

        $teams = Team::find()->orderBy('sort asc')->all();
        $banner = Banners::find()->where(['menu_id'=>MenuIdEnum::ID_ABOUT,'status'=>1])->one();
        //二级菜单
        $seconds = Menu::getSecondMenu(MenuIdEnum::ID_ABOUT);
        return $this->render('team',[
                'teams' => $teams,
                'banner' => $banner,
                'seconds' => $seconds
            ]);
    }

     /**
     * 关于我们（合作伙伴）
     */
    public function actionPartner() {

        $partners = Partner::find()->orderBy('sort asc')->all();
        $banner = Banners::find()->where(['menu_id'=>MenuIdEnum::ID_ABOUT,'status'=>1])->one();
        //二级菜单
        $seconds = Menu::getSecondMenu(MenuIdEnum::ID_ABOUT);
        return $this->render('partner',[
                'partners' => $partners,
                'banner' => $banner,
                'seconds' => $seconds
            ]);
    }

    /**
     * 关于我们（公司简介）
     */
    public function actionCompany()
    {
        $this->view->title = "关于我们--公司简介";
        $info = DataItems::find()->where([
                'menu_id' => MenuIdEnum::ID_ABOUT_COMPANY,
                'status' => 1,
                'location' => LocationEnum::COMPANY_LOCATION_UP,
            ])->one();
        $product = DataItems::find()->where([
                'menu_id' => MenuIdEnum::ID_ABOUT_COMPANY,
                'status' => 1,
                'location' => LocationEnum::COMPANY_LOCATION_DOWN,
            ])->all();
        return $this->render('company', compact('info', 'product'));
    }
}
