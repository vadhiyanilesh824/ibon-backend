<?php

namespace App\Services\V1;
use Illuminate\Http\Request;

class PostQuery{
    protected $safeParams = [
        'title' => ['eq'],
    ];

    protected $columnMap = [];   // If need to change Column Name with map

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<'
    ];

    public function transform(Request $request){
        $eloQuery = [];
        foreach ($this->safeParams as $parm => $operators){
            $query = $request->query($parm);
            
            if(!isset($query)){
                continue;
            }
            
            $column = $this->columnMap[$parm] ?? $parm ;

            foreach ($operators as $operator){
                if(isset($query[$operator])){
                    $eloQuery[] = [$column, $this->operatorMap[$operator],$query[$operator]];
                    // Query should be like this [ column , operator, value ]
                }
            }
        }
        return $eloQuery;
    }
}
