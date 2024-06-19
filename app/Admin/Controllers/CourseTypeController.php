<?php

namespace App\Admin\Controllers;

use App\Models\User;
use App\Models\CourseType;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Tree;

class CourseTypeController extends AdminController
{
    public function index(Content $content){
        $tree = new Tree(new CourseType);
        return $content->header('Course Types')->body($tree);
    }
    //
    protected function detail($id)
    {
        $show = new Show(CourseType::findOrFail($id));

        $show->feild('id', __('Id'));
        $show->feild('title', __('Category'));
        $show->feild('description', __('Description'));
        $show->feild('order', __('Order'));
      
        $show->feild('created_at', __('Created at'));
        $show->feild('updated_at', __('Updated At'));

     /*   $show->disableActions();
        $show->disableCreateButton();
        $show->disableExport();
        $show->disableFilter();
        */

        //$grid->feild('updated_at', __('Updated at'));

        return $show;
    }

    protected function form()
    {
        $form = new Form(new CourseType());
        $form->select('parent_id', __('Parent Category'))->options((new CourseType())::selectOptions());
       $form->text('title', __('Title'));
       $form->textarea('description', __('Description'));
       $form->number('Order', __('Order'));
        return $form;
    }
}
