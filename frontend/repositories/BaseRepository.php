<?php
namespace frontend\repositories;

use frontend\repositories\interfaces\IBaseRepository;
use mhndev\yii2Repository\AbstractSqlArRepository;
use mhndev\yii2Repository\Traits\SqlArRepositoryTrait;
use yii\base\Component;

//one
class BaseRepository extends AbstractSqlArRepository implements IBaseRepository
{
	
}

//two
// class BaseRepository extends Component implements IBaseRepository
// {

//     const PRIMARY_KEY = 'id';
//     const APPLICATION_KEY = 'id';

//     use SqlArRepositoryTrait {
//         init as repositoryInit;
//     }

//     public function init()
//     {
//         parent::init();
//         $this->repositoryInit();
//     }
// }