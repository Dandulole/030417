<?php

class PostController extends Controller
{
	public function actionIndex()
	{
                $criteria = new CDbCriteria;
                $criteria->compare('status',1);
                $criteria->condition = 'id > 1';
                
                //Pagination
                $pages = new CPagination(Post::model()->count($criteria));
                $pages->pageSize = 5;
                $pages->applyLimit($criteria);
                
                
                $model = Post::model()->findAll($criteria);
		$this->render('index', array('model'=>$model, 'pages' => $pages));
	}

        
        public function actionView($alias) {
            
            $criteria = new CDbCriteria;
            $criteria->compare('cpu_uri',$alias);
            //$criteria->compare('title',Post::makeUrlCode($alias));
            $criteria->compare('status',1);
            

            $model = Post::model()->find($criteria);

            
            if ($model) {
                $this->render('view', array('model'=>$model));
            } else {
                echo "model is NULL";
                echo '<br>';
                echo 'alias = ' .  Post::makeUrlCode($alias);
            }
        }
}