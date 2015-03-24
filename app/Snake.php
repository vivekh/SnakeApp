<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Snake extends Model {

	protected $fillable = ['name','age','sex'];

    public static  function production($days) {
        $venom = 0; $skin = 0;
        $snakes = Snake::all();

        foreach($snakes as $snake){
            if(($snake->age*100 + $days) >= 1000){
                $skin++;
                continue;
            }

            $foodDay = 5 + ($snake->age * 100 * 0.01);

            for($i=0;$i<$days;$i++) {
                $age = $snake->age * 100 + $i;
                $venom += (50 - ($age * 0.03));
            }
        }

        return array('venom' => $venom ,'leather' => $skin);
    }

    public static function livestock($days) {
        $snakes = Snake::all();
        $mice = 0;
        $response = array();
        foreach($snakes as $snake){
            $age = $snake->age * 100 + $days;
            $foodDay = 5 + ($snake->age * 100 * 0.01);
            $mice+= floor($days/$foodDay);
            $lastFood = $age - ($days % $foodDay);
            $response[] = array('name' => $snake->name,'age' => $age*0.01, 'age-last-fed' => $lastFood*0.01);
        }
        return array('mice' => $mice, 'snakes' => $response);
    }
}
