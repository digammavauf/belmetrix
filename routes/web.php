<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);
// Admin

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::post('permissions/parse-csv-import', 'PermissionsController@parseCsvImport')->name('permissions.parseCsvImport');
    Route::post('permissions/process-csv-import', 'PermissionsController@processCsvImport')->name('permissions.processCsvImport');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::post('roles/parse-csv-import', 'RolesController@parseCsvImport')->name('roles.parseCsvImport');
    Route::post('roles/process-csv-import', 'RolesController@processCsvImport')->name('roles.processCsvImport');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/parse-csv-import', 'UsersController@parseCsvImport')->name('users.parseCsvImport');
    Route::post('users/process-csv-import', 'UsersController@processCsvImport')->name('users.processCsvImport');
    Route::resource('users', 'UsersController');

    // Currencies
    Route::delete('currencies/destroy', 'CurrencyController@massDestroy')->name('currencies.massDestroy');
    Route::post('currencies/parse-csv-import', 'CurrencyController@parseCsvImport')->name('currencies.parseCsvImport');
    Route::post('currencies/process-csv-import', 'CurrencyController@processCsvImport')->name('currencies.processCsvImport');
    Route::resource('currencies', 'CurrencyController');

    // Transaction Types
    Route::delete('transaction-types/destroy', 'TransactionTypeController@massDestroy')->name('transaction-types.massDestroy');
    Route::post('transaction-types/parse-csv-import', 'TransactionTypeController@parseCsvImport')->name('transaction-types.parseCsvImport');
    Route::post('transaction-types/process-csv-import', 'TransactionTypeController@processCsvImport')->name('transaction-types.processCsvImport');
    Route::resource('transaction-types', 'TransactionTypeController');

    // Income Sources
    Route::delete('income-sources/destroy', 'IncomeSourceController@massDestroy')->name('income-sources.massDestroy');
    Route::post('income-sources/parse-csv-import', 'IncomeSourceController@parseCsvImport')->name('income-sources.parseCsvImport');
    Route::post('income-sources/process-csv-import', 'IncomeSourceController@processCsvImport')->name('income-sources.processCsvImport');
    Route::resource('income-sources', 'IncomeSourceController');

    // Client Statuses
    Route::delete('client-statuses/destroy', 'ClientStatusController@massDestroy')->name('client-statuses.massDestroy');
    Route::post('client-statuses/parse-csv-import', 'ClientStatusController@parseCsvImport')->name('client-statuses.parseCsvImport');
    Route::post('client-statuses/process-csv-import', 'ClientStatusController@processCsvImport')->name('client-statuses.processCsvImport');
    Route::resource('client-statuses', 'ClientStatusController');

    // Project Statuses
    Route::delete('project-statuses/destroy', 'ProjectStatusController@massDestroy')->name('project-statuses.massDestroy');
    Route::post('project-statuses/parse-csv-import', 'ProjectStatusController@parseCsvImport')->name('project-statuses.parseCsvImport');
    Route::post('project-statuses/process-csv-import', 'ProjectStatusController@processCsvImport')->name('project-statuses.processCsvImport');
    Route::resource('project-statuses', 'ProjectStatusController');

    // Clients
    Route::delete('clients/destroy', 'ClientController@massDestroy')->name('clients.massDestroy');
    Route::post('clients/parse-csv-import', 'ClientController@parseCsvImport')->name('clients.parseCsvImport');
    Route::post('clients/process-csv-import', 'ClientController@processCsvImport')->name('clients.processCsvImport');
    Route::resource('clients', 'ClientController');

    // Projects
    Route::delete('projects/destroy', 'ProjectController@massDestroy')->name('projects.massDestroy');
    Route::post('projects/parse-csv-import', 'ProjectController@parseCsvImport')->name('projects.parseCsvImport');
    Route::post('projects/process-csv-import', 'ProjectController@processCsvImport')->name('projects.processCsvImport');
    Route::resource('projects', 'ProjectController');

    // Notes
    Route::delete('notes/destroy', 'NoteController@massDestroy')->name('notes.massDestroy');
    Route::post('notes/parse-csv-import', 'NoteController@parseCsvImport')->name('notes.parseCsvImport');
    Route::post('notes/process-csv-import', 'NoteController@processCsvImport')->name('notes.processCsvImport');
    Route::resource('notes', 'NoteController');

    // Documents
    Route::delete('documents/destroy', 'DocumentController@massDestroy')->name('documents.massDestroy');
    Route::post('documents/media', 'DocumentController@storeMedia')->name('documents.storeMedia');
    Route::post('documents/ckmedia', 'DocumentController@storeCKEditorImages')->name('documents.storeCKEditorImages');
    Route::resource('documents', 'DocumentController');

    // Transactions
    Route::delete('transactions/destroy', 'TransactionController@massDestroy')->name('transactions.massDestroy');
    Route::post('transactions/parse-csv-import', 'TransactionController@parseCsvImport')->name('transactions.parseCsvImport');
    Route::post('transactions/process-csv-import', 'TransactionController@processCsvImport')->name('transactions.processCsvImport');
    Route::resource('transactions', 'TransactionController');

    // Client Reports
    Route::delete('client-reports/destroy', 'ClientReportController@massDestroy')->name('client-reports.massDestroy');
    Route::resource('client-reports', 'ClientReportController');

    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
});
