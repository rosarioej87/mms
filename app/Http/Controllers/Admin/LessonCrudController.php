<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LessonRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class LessonCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class LessonCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Lesson::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/lesson');
        CRUD::setEntityNameStrings('lesson', 'lessons');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('topic');
        CRUD::column('content');

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
        CRUD::setValidation(LessonRequest::class);

        CRUD::field('topic');
        $this->crud->addField(
            [   // Summernote
                'name'  => 'content',
                'label' => 'Content',
                'type'  => 'summernote',
                'options' => [],
            ],
        );

        $this->crud->addField([   // Upload
            'name'      => 'image',
            'label'     => 'Image',
            'type'      => 'upload',
            'upload'    => true,
            'disk'      => 'public', // if you store files in the /public folder, please omit this; if you store them in /storage or S3, please specify it;
            // optional:
            // 'temporary' => 10 // if using a service, such as S3, that requires you to make temporary URLs this will make a URL that is valid for the number of minutes specified
        ],);


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
                'name'      => 'topic', // The db column name
                'label'     => 'Tag Name', // Table column heading
                // 'prefix' => 'Name: ',
                // 'suffix' => '(user)',
                'limit'  => 120, // character limit; default is 50
                // 'escaped' => false, // echo using {!! !!} instead of {{ }}, in order to render HTML
             ],);

             $this->crud->addColumn(
                [
                    'name'      => 'image', // The db column name
                    'label'     => 'Profile image', // Table column heading
                    'type'      => 'image',
                    // 'prefix' => '/folder_1/subfolder_1/',
                        // image from a different disk (like s3 bucket)
                    'disk'   => 'public', 
                        // optional width/height if 25px is not ok with you
                    'height' => '100px',
                    'width'  => '100px',
                 ],);

                 $this->crud->addColumn(
                    [
                        'name'      => 'content', // The db column name
                        'label'     => 'Content', // Table column heading
                        // 'prefix' => 'Name: ',
                        // 'suffix' => '(user)',
                        'limit'  => 100000, // character limit; default is 50
                        'escaped' => false, // echo using {!! !!} instead of {{ }}, in order to render HTML
                     ],);
    }
}
