<?php

namespace App\Admin\Controllers;

use App\Models\User;
use App\Models\CourseType;
use App\Models\Course;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Tree;

class CourseController extends AdminController
{
   
    protected function detail($id)
    {
        $show = new Show(Course::findOrFail($id));

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

        //$grid->feild('updated_at', __('Updated at'));, updated

        return $show;
    }

    protected function form()
    {
        $form = new Form(new Course());
        $form->text('name', __('Name'));
        $result = Course::pluck('title', id);
        dd(result);
        $form->select('parent_id', __('Parent Category'))->options((new CourseType())::selectOptions());
       $form->text('title', __('Title'));
       $form->textarea('description', __('Description'));
       $form->number('Order', __('Order'));
        return $form;
    }
}
