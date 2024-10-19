<?php
namespace App\Dash\Metrics\Values;

use App\Models\User;
use Dash\Extras\Metrics\Value;

class AllAdmins extends Value{

    /**
     * calculate method is short to calc to using in value
     * for more information about this visit https://phpdash.com/docs/1.x/Metrics#Value
     * @return $this->sum or count method
     *
     */
      public function calc(){
        return
        $this->count(User::class,function($q){
            $q->where('account_type','admin');
        })
         ->column(3)
         ->href(dash('resource/Admins'))
         ->icon('<i class="fa fa-users"></i>')
         ->title('Admins')
        // ->subTitle('Your subTitle')
       //  ->textBody('Text In Body') // optional
       // ->suffix('Your suffix') // optional add suffix after number
         ->prefix('<i class="fa fa-user"></i> ');

    }

     /**
     * ranges
     * enable dropdown select to set range to count or sum data you can add more by days like 730
     * @return array
     */
    public function ranges(){
        return [
            'all'=>'All',
            'today'=>'Today',
            'yesterday'=>'Yesterday',
            '3'=>'last 3 days',
            '4'=>'last 4 days',
            'week'=>'Week',
            'month'=>'month',
            'year'=>'year',
            '730'=>'2 years',
        ];
    }

}
