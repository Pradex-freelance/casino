<?php


namespace pradex\commands;

use pradex\QueryBuilder;
use pradex\views\AjaxView;

class GetGamesAjaxCommand extends Command
{
    public function execute($request)
    {

        $result = array();

        $result['test'] = 'test';

        $sql = QueryBuilder::table('db_games')
            ->where('publish', '=', 0)
            ->andWhere('cat', '=', 0);

        if(isset($request['breeder'])){
            if ($request['breeder'] == 100){
                $sql->andWhere('new', '=', 1);
            }
            elseif ($request['breeder'] != 0 ){
                $sql->andWhere('breeder', '=', $request['breeder']);
            }
        }

        !isset($request['name_en']) ?: $sql->andWhere('name_en', 'LIKE', '%'.$request['name_en'].'%');
        !isset($request['start']) ?: $sql->andWhere('id', '>', $request['start']);
        !isset($request['limit']) ?: $sql->limit($request['limit']);

        $sql->orderBy('new')->desc();

        $result = $sql->get();

        AjaxView::view($result);
    }
}