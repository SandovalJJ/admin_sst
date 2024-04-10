<?php

Route::view('/', 'welcome');
Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Funcionario
    Route::delete('funcionarios/destroy', 'FuncionarioController@massDestroy')->name('funcionarios.massDestroy');
    Route::post('funcionarios/parse-csv-import', 'FuncionarioController@parseCsvImport')->name('funcionarios.parseCsvImport');
    Route::post('funcionarios/process-csv-import', 'FuncionarioController@processCsvImport')->name('funcionarios.processCsvImport');
    Route::resource('funcionarios', 'FuncionarioController');

    // Asistencia
    Route::delete('asistencia/destroy', 'AsistenciaController@massDestroy')->name('asistencia.massDestroy');
    Route::post('asistencia/parse-csv-import', 'AsistenciaController@parseCsvImport')->name('asistencia.parseCsvImport');
    Route::post('asistencia/process-csv-import', 'AsistenciaController@processCsvImport')->name('asistencia.processCsvImport');
    Route::resource('asistencia', 'AsistenciaController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Presupuesto
    Route::delete('presupuestos/destroy', 'PresupuestoController@massDestroy')->name('presupuestos.massDestroy');
    Route::resource('presupuestos', 'PresupuestoController');

    // Crono Cap
    Route::delete('crono-caps/destroy', 'CronoCapController@massDestroy')->name('crono-caps.massDestroy');
    Route::resource('crono-caps', 'CronoCapController');

    // Seguridad Sy S
    Route::delete('seguridad-sies/destroy', 'SeguridadSySController@massDestroy')->name('seguridad-sies.massDestroy');
    Route::resource('seguridad-sies', 'SeguridadSySController');

    // Politica Sst
    Route::delete('politica-ssts/destroy', 'PoliticaSstController@massDestroy')->name('politica-ssts.massDestroy');
    Route::resource('politica-ssts', 'PoliticaSstController');

    // Objetivos Del Sistema
    Route::delete('objetivos-del-sistemas/destroy', 'ObjetivosDelSistemaController@massDestroy')->name('objetivos-del-sistemas.massDestroy');
    Route::resource('objetivos-del-sistemas', 'ObjetivosDelSistemaController');

    // Evaluaciongestion
    Route::delete('evaluaciongestions/destroy', 'EvaluaciongestionController@massDestroy')->name('evaluaciongestions.massDestroy');
    Route::resource('evaluaciongestions', 'EvaluaciongestionController');

    // Plan De Trabajo
    Route::delete('plan-de-trabajos/destroy', 'PlanDeTrabajoController@massDestroy')->name('plan-de-trabajos.massDestroy');
    Route::resource('plan-de-trabajos', 'PlanDeTrabajoController');

    // Control Documental
    Route::delete('control-documentals/destroy', 'ControlDocumentalController@massDestroy')->name('control-documentals.massDestroy');
    Route::resource('control-documentals', 'ControlDocumentalController');

    // Rendicion Cuentas
    Route::delete('rendicion-cuenta/destroy', 'RendicionCuentasController@massDestroy')->name('rendicion-cuenta.massDestroy');
    Route::resource('rendicion-cuenta', 'RendicionCuentasController');

    // Matriz Legal
    Route::delete('matriz-legals/destroy', 'MatrizLegalController@massDestroy')->name('matriz-legals.massDestroy');
    Route::resource('matriz-legals', 'MatrizLegalController');

    // Manual Contratistas
    Route::delete('manual-contratista/destroy', 'ManualContratistasController@massDestroy')->name('manual-contratista.massDestroy');
    Route::resource('manual-contratista', 'ManualContratistasController');

    // Gestion Del Cambio
    Route::delete('gestion-del-cambios/destroy', 'GestionDelCambioController@massDestroy')->name('gestion-del-cambios.massDestroy');
    Route::resource('gestion-del-cambios', 'GestionDelCambioController');

    // Diagnostico Salud
    Route::delete('diagnostico-saluds/destroy', 'DiagnosticoSaludController@massDestroy')->name('diagnostico-saluds.massDestroy');
    Route::resource('diagnostico-saluds', 'DiagnosticoSaludController');

    // Examenes Medicos
    Route::delete('examenes-medicos/destroy', 'ExamenesMedicosController@massDestroy')->name('examenes-medicos.massDestroy');
    Route::resource('examenes-medicos', 'ExamenesMedicosController');

    // Restricciones Y Recomendaciones
    Route::delete('restricciones-y-recomendaciones/destroy', 'RestriccionesYRecomendacionesController@massDestroy')->name('restricciones-y-recomendaciones.massDestroy');
    Route::resource('restricciones-y-recomendaciones', 'RestriccionesYRecomendacionesController');

    // Reintegro Laboral
    Route::delete('reintegro-laborals/destroy', 'ReintegroLaboralController@massDestroy')->name('reintegro-laborals.massDestroy');
    Route::resource('reintegro-laborals', 'ReintegroLaboralController');

    // Custodia De Historias Clinicas
    Route::delete('custodia-de-historias-clinicas/destroy', 'CustodiaDeHistoriasClinicasController@massDestroy')->name('custodia-de-historias-clinicas.massDestroy');
    Route::resource('custodia-de-historias-clinicas', 'CustodiaDeHistoriasClinicasController');

    // Pausas Activas
    Route::delete('pausas-activas/destroy', 'PausasActivasController@massDestroy')->name('pausas-activas.massDestroy');
    Route::resource('pausas-activas', 'PausasActivasController');

    // Estilo De Vida Saludable
    Route::delete('estilo-de-vida-saludables/destroy', 'EstiloDeVidaSaludableController@massDestroy')->name('estilo-de-vida-saludables.massDestroy');
    Route::resource('estilo-de-vida-saludables', 'EstiloDeVidaSaludableController');

    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Funcionario
    Route::delete('funcionarios/destroy', 'FuncionarioController@massDestroy')->name('funcionarios.massDestroy');
    Route::resource('funcionarios', 'FuncionarioController');

    // Asistencia
    Route::delete('asistencia/destroy', 'AsistenciaController@massDestroy')->name('asistencia.massDestroy');
    Route::resource('asistencia', 'AsistenciaController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Presupuesto
    Route::delete('presupuestos/destroy', 'PresupuestoController@massDestroy')->name('presupuestos.massDestroy');
    Route::resource('presupuestos', 'PresupuestoController');

    // Crono Cap
    Route::delete('crono-caps/destroy', 'CronoCapController@massDestroy')->name('crono-caps.massDestroy');
    Route::resource('crono-caps', 'CronoCapController');

    // Seguridad Sy S
    Route::delete('seguridad-sies/destroy', 'SeguridadSySController@massDestroy')->name('seguridad-sies.massDestroy');
    Route::resource('seguridad-sies', 'SeguridadSySController');

    // Politica Sst
    Route::delete('politica-ssts/destroy', 'PoliticaSstController@massDestroy')->name('politica-ssts.massDestroy');
    Route::resource('politica-ssts', 'PoliticaSstController');

    // Objetivos Del Sistema
    Route::delete('objetivos-del-sistemas/destroy', 'ObjetivosDelSistemaController@massDestroy')->name('objetivos-del-sistemas.massDestroy');
    Route::resource('objetivos-del-sistemas', 'ObjetivosDelSistemaController');

    // Evaluaciongestion
    Route::delete('evaluaciongestions/destroy', 'EvaluaciongestionController@massDestroy')->name('evaluaciongestions.massDestroy');
    Route::resource('evaluaciongestions', 'EvaluaciongestionController');

    // Plan De Trabajo
    Route::delete('plan-de-trabajos/destroy', 'PlanDeTrabajoController@massDestroy')->name('plan-de-trabajos.massDestroy');
    Route::resource('plan-de-trabajos', 'PlanDeTrabajoController');

    // Control Documental
    Route::delete('control-documentals/destroy', 'ControlDocumentalController@massDestroy')->name('control-documentals.massDestroy');
    Route::resource('control-documentals', 'ControlDocumentalController');

    // Rendicion Cuentas
    Route::delete('rendicion-cuenta/destroy', 'RendicionCuentasController@massDestroy')->name('rendicion-cuenta.massDestroy');
    Route::resource('rendicion-cuenta', 'RendicionCuentasController');

    // Matriz Legal
    Route::delete('matriz-legals/destroy', 'MatrizLegalController@massDestroy')->name('matriz-legals.massDestroy');
    Route::resource('matriz-legals', 'MatrizLegalController');

    // Manual Contratistas
    Route::delete('manual-contratista/destroy', 'ManualContratistasController@massDestroy')->name('manual-contratista.massDestroy');
    Route::resource('manual-contratista', 'ManualContratistasController');

    // Gestion Del Cambio
    Route::delete('gestion-del-cambios/destroy', 'GestionDelCambioController@massDestroy')->name('gestion-del-cambios.massDestroy');
    Route::resource('gestion-del-cambios', 'GestionDelCambioController');

    // Diagnostico Salud
    Route::delete('diagnostico-saluds/destroy', 'DiagnosticoSaludController@massDestroy')->name('diagnostico-saluds.massDestroy');
    Route::resource('diagnostico-saluds', 'DiagnosticoSaludController');

    // Examenes Medicos
    Route::delete('examenes-medicos/destroy', 'ExamenesMedicosController@massDestroy')->name('examenes-medicos.massDestroy');
    Route::resource('examenes-medicos', 'ExamenesMedicosController');

    // Restricciones Y Recomendaciones
    Route::delete('restricciones-y-recomendaciones/destroy', 'RestriccionesYRecomendacionesController@massDestroy')->name('restricciones-y-recomendaciones.massDestroy');
    Route::resource('restricciones-y-recomendaciones', 'RestriccionesYRecomendacionesController');

    // Reintegro Laboral
    Route::delete('reintegro-laborals/destroy', 'ReintegroLaboralController@massDestroy')->name('reintegro-laborals.massDestroy');
    Route::resource('reintegro-laborals', 'ReintegroLaboralController');

    // Custodia De Historias Clinicas
    Route::delete('custodia-de-historias-clinicas/destroy', 'CustodiaDeHistoriasClinicasController@massDestroy')->name('custodia-de-historias-clinicas.massDestroy');
    Route::resource('custodia-de-historias-clinicas', 'CustodiaDeHistoriasClinicasController');

    // Pausas Activas
    Route::delete('pausas-activas/destroy', 'PausasActivasController@massDestroy')->name('pausas-activas.massDestroy');
    Route::resource('pausas-activas', 'PausasActivasController');

    // Estilo De Vida Saludable
    Route::delete('estilo-de-vida-saludables/destroy', 'EstiloDeVidaSaludableController@massDestroy')->name('estilo-de-vida-saludables.massDestroy');
    Route::resource('estilo-de-vida-saludables', 'EstiloDeVidaSaludableController');

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
});
