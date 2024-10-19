<?php
namespace App\Dash\Resources;
use App\Enums\Gender;
use App\Policies\CategoryPolicy;
use Dash\Resource;

use App\Models\Category;
class Categories extends Resource {

	/**
	 * define Model of resource
	 * @var string $model
	 */
	public static $model = Category::class;

	/**
	 * Policy Permission can handel
	 * (viewAny,view,create,update,delete,forceDelete,restore) methods
	 * @var string $policy
	 */
	public static $policy = CategoryPolicy::class;
    public static $appendToMainSearch = false;


    public static function dtButtons() {
        return [
            'csv',
            'print',
            'pdf',
            'excel',

        ];
    }

	/**
	 * define this resource in group to show in navigation menu
	 * if you need to translate a dynamic name
	 * define dash.php in /resources/views/lang/en/dash.php
	 * and add this key directly users
	 * @var string $group
	 */
	public static $group = 'Category';

	/**
	 * show or hide resouce In Navigation Menu true|false
	 * @var bool $displayInMenu
	 */
	public static $displayInMenu = true;

	/**
	 * change icon in navigation menu
	 * you can use font awesome icons LIKE (<i class="fa fa-users"></i>)
	 * @var string $icon
	 */
	public static $icon = '<i class="fa fa-tags"></i>'; // put <i> tag or icon name

	/**
	 * title static property to labels in Rows,Show,Forms
	 * @var string $title
	 */
	public static $title = 'name';


    public static function customName() {
        return 'Category';
    }


    /**
	 * defining column name to enable or disable search in main resource page
	 * @var array<string> $search
	 */
	public static $search = [
		'id',
		'name',
	];

	/**
	 *  if you want define relationship searches
	 *  one or Multiple Relations
	 * 	Example: method=> 'invoices'  => columns=>['title'],
	 * @var array<string> $searchWithRelation
	 */
	public static $searchWithRelation = [];

	/**
	 * if you need to custom resource name in menu navigation
	 * @return string
	 */


	/**
	 * you can define vertext in header of page like (Card,HTML,view blade)
	 * @return array<string>
	 */
	public static function vertex() {
		return [];
	}

	/**
	 * define fields by Helpers
	 * @return array<string>
	 */

    public function fields() {
		return [
			id(__('dash::dash.id'), 'id'),
            text() ->make('User Name', 'name')
                ->orderable(false)
                ->ruleWhenCreate('string', 'min:4')
                ->ruleWhenUpdate('string', 'min:4')
                ->column(6)
                ->showInShow(),
            text() ->make('Slug', 'slug')
                ->orderable(false)
                ->column(6)
                ->showInShow(),
            textarea() ->make('Description', 'description')
                ->orderable(false)
                ->ruleWhenCreate('String')
                ->ruleWhenUpdate('string')
                ->column(12)
                ->showInShow(),
            select() ->make('Status', 'status')
                ->orderable(false)
                ->options([
                    '1' =>'مفعل',
                    '0' =>'قيد الانتظار'
                ])
                ->column(12)
                ->showInShow(),
            belongsTo()->make('User','user',Users::class)->rule('required')
        ];
	}

	/**
	 * define the actions To Using in Resource (index,show)
	 * php artisan dash:make-action ActionName
	 * @return array<string>
	 */
	public function actions() {
		return [];
	}

	/**
	 * define the filters To Using in Resource (index)
	 * php artisan dash:make-filter FilterName
	 * @return array<string>
	 */
	public function filters() {
		return [];
	}

}
