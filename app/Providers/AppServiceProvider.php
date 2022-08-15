<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use App\Models\Accountstype;
use App\Models\ChartAccount;
use App\Models\Employee;
use App\Models\EmployeeSalary;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $empsum = Employee::sum('salary');
        $chart = ChartAccount::find(6);
        
        $date = $chart->created_at->format('m');
        $cur_date = date('m');

        if($date != $cur_date )
        {
            $empdate = EmployeeSalary::Where('status',1)->get();
           
            foreach($empdate as $value){
            $value->status = 0;
            $value->update();

            }
            $adv = Employee::sum('advance');
            if($adv !=  null){

                
                $chart->account_payable = $empsum - $adv;
                $chart->paid = $adv;
                $chart->created_at = Carbon::now();
                $chart->update();
                return "changed salary status";
                
            }
            else{
                
                $chart->account_payable = $empsum;
                $chart->paid = 0;
                $chart->created_at = Carbon::now();
                $chart->update();
                return "changed salary status";
            }
            
        }
        return "not changed salary status";



    }
}
