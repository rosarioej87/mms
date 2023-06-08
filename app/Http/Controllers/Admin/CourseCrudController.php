<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CourseRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CourseCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CourseCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Course::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/course');
        CRUD::setEntityNameStrings('course', 'courses');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('crs_code');
        CRUD::column('crs_title');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(CourseRequest::class);

        CRUD::field('crs_code');
        CRUD::field('crs_title');
        $this->crud->addField(
            [   // Summernote
                'name'  => 'crs_outline',
                'label' => 'Content',
                'type'  => 'summernote',
                'options' => [],
            ],
        );
        

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {
        $this->crud->setOperationSetting('tabsEnabled', true);
        $this->crud->addColumn(
            [
                'name'      => 'crs_code', // The db column name
                'label'     => 'Tag Name', // Table column heading
                // 'prefix' => 'Name: ',
                // 'suffix' => '(user)',
                'limit'  => 120, // character limit; default is 50
                // 'escaped' => false, // echo using {!! !!} instead of {{ }}, in order to render HTML
             ],);

        $this->crud->addColumn(
            [
                'name'      => 'crs_title', // The db column name
                'label'     => 'Tag Name', // Table column heading
                // 'prefix' => 'Name: ',
                // 'suffix' => '(user)',
                'limit'  => 120, // character limit; default is 50
                // 'escaped' => false, // echo using {!! !!} instead of {{ }}, in order to render HTML
            ],);
    

        $this->crud->addColumn(
            [
                'name'      => 'crs_outline', // The db column name
                'label'     => 'Course Outline', // Table column heading
                // 'prefix' => 'Name: ',
                // 'suffix' => '(user)',
                'limit'  => 100000, // character limit; default is 50
                'escaped' => false, // echo using {!! !!} instead of {{ }}, in order to render HTML
            ],);
    }
}
