<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <a href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('user_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span>{{ trans('cruds.userManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('permission_access')
                            <li class="{{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                <a href="{{ route("admin.permissions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>{{ trans('cruds.permission.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                <a href="{{ route("admin.roles.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.role.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="{{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                <a href="{{ route("admin.users.index") }}">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span>{{ trans('cruds.user.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('audit_log_access')
                            <li class="{{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                                <a href="{{ route("admin.audit-logs.index") }}">
                                    <i class="fa-fw fas fa-file-alt">

                                    </i>
                                    <span>{{ trans('cruds.auditLog.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('planear_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.planear.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('presupuesto_access')
                            <li class="{{ request()->is("admin/presupuestos") || request()->is("admin/presupuestos/*") ? "active" : "" }}">
                                <a href="{{ route("admin.presupuestos.index") }}">
                                    <i class="fa-fw fas fa-dollar-sign">

                                    </i>
                                    <span>{{ trans('cruds.presupuesto.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('crono_cap_access')
                            <li class="{{ request()->is("admin/crono-caps") || request()->is("admin/crono-caps/*") ? "active" : "" }}">
                                <a href="{{ route("admin.crono-caps.index") }}">
                                    <i class="fa-fw far fa-calendar-alt">

                                    </i>
                                    <span>{{ trans('cruds.cronoCap.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('seguridad_sy_access')
                            <li class="{{ request()->is("admin/seguridad-sies") || request()->is("admin/seguridad-sies/*") ? "active" : "" }}">
                                <a href="{{ route("admin.seguridad-sies.index") }}">
                                    <i class="fa-fw fas fa-shield-alt">

                                    </i>
                                    <span>{{ trans('cruds.seguridadSy.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('politica_sst_access')
                            <li class="{{ request()->is("admin/politica-ssts") || request()->is("admin/politica-ssts/*") ? "active" : "" }}">
                                <a href="{{ route("admin.politica-ssts.index") }}">
                                    <i class="fa-fw fas fa-book">

                                    </i>
                                    <span>{{ trans('cruds.politicaSst.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('objetivos_del_sistema_access')
                            <li class="{{ request()->is("admin/objetivos-del-sistemas") || request()->is("admin/objetivos-del-sistemas/*") ? "active" : "" }}">
                                <a href="{{ route("admin.objetivos-del-sistemas.index") }}">
                                    <i class="fa-fw fas fa-list-ol">

                                    </i>
                                    <span>{{ trans('cruds.objetivosDelSistema.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('evaluaciongestion_access')
                            <li class="{{ request()->is("admin/evaluaciongestions") || request()->is("admin/evaluaciongestions/*") ? "active" : "" }}">
                                <a href="{{ route("admin.evaluaciongestions.index") }}">
                                    <i class="fa-fw fas fa-book-open">

                                    </i>
                                    <span>{{ trans('cruds.evaluaciongestion.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('plan_de_trabajo_access')
                            <li class="{{ request()->is("admin/plan-de-trabajos") || request()->is("admin/plan-de-trabajos/*") ? "active" : "" }}">
                                <a href="{{ route("admin.plan-de-trabajos.index") }}">
                                    <i class="fa-fw far fa-address-book">

                                    </i>
                                    <span>{{ trans('cruds.planDeTrabajo.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('control_documental_access')
                            <li class="{{ request()->is("admin/control-documentals") || request()->is("admin/control-documentals/*") ? "active" : "" }}">
                                <a href="{{ route("admin.control-documentals.index") }}">
                                    <i class="fa-fw fas fa-address-book">

                                    </i>
                                    <span>{{ trans('cruds.controlDocumental.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('rendicion_cuentum_access')
                            <li class="{{ request()->is("admin/rendicion-cuenta") || request()->is("admin/rendicion-cuenta/*") ? "active" : "" }}">
                                <a href="{{ route("admin.rendicion-cuenta.index") }}">
                                    <i class="fa-fw fas fa-hand-holding-usd">

                                    </i>
                                    <span>{{ trans('cruds.rendicionCuentum.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('matriz_legal_access')
                            <li class="{{ request()->is("admin/matriz-legals") || request()->is("admin/matriz-legals/*") ? "active" : "" }}">
                                <a href="{{ route("admin.matriz-legals.index") }}">
                                    <i class="fa-fw fas fa-table">

                                    </i>
                                    <span>{{ trans('cruds.matrizLegal.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('manual_contratistum_access')
                            <li class="{{ request()->is("admin/manual-contratista") || request()->is("admin/manual-contratista/*") ? "active" : "" }}">
                                <a href="{{ route("admin.manual-contratista.index") }}">
                                    <i class="fa-fw fas fa-book">

                                    </i>
                                    <span>{{ trans('cruds.manualContratistum.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('gestion_del_cambio_access')
                            <li class="{{ request()->is("admin/gestion-del-cambios") || request()->is("admin/gestion-del-cambios/*") ? "active" : "" }}">
                                <a href="{{ route("admin.gestion-del-cambios.index") }}">
                                    <i class="fa-fw far fa-folder">

                                    </i>
                                    <span>{{ trans('cruds.gestionDelCambio.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('hacer_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-pencil-alt">

                        </i>
                        <span>{{ trans('cruds.hacer.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('diagnostico_salud_access')
                            <li class="{{ request()->is("admin/diagnostico-saluds") || request()->is("admin/diagnostico-saluds/*") ? "active" : "" }}">
                                <a href="{{ route("admin.diagnostico-saluds.index") }}">
                                    <i class="fa-fw fas fa-medkit">

                                    </i>
                                    <span>{{ trans('cruds.diagnosticoSalud.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('examenes_medico_access')
                            <li class="{{ request()->is("admin/examenes-medicos") || request()->is("admin/examenes-medicos/*") ? "active" : "" }}">
                                <a href="{{ route("admin.examenes-medicos.index") }}">
                                    <i class="fa-fw fas fa-briefcase-medical">

                                    </i>
                                    <span>{{ trans('cruds.examenesMedico.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('restricciones_y_recomendacione_access')
                            <li class="{{ request()->is("admin/restricciones-y-recomendaciones") || request()->is("admin/restricciones-y-recomendaciones/*") ? "active" : "" }}">
                                <a href="{{ route("admin.restricciones-y-recomendaciones.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>{{ trans('cruds.restriccionesYRecomendacione.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('reintegro_laboral_access')
                            <li class="{{ request()->is("admin/reintegro-laborals") || request()->is("admin/reintegro-laborals/*") ? "active" : "" }}">
                                <a href="{{ route("admin.reintegro-laborals.index") }}">
                                    <i class="fa-fw far fa-handshake">

                                    </i>
                                    <span>{{ trans('cruds.reintegroLaboral.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('custodia_de_historias_clinica_access')
                            <li class="{{ request()->is("admin/custodia-de-historias-clinicas") || request()->is("admin/custodia-de-historias-clinicas/*") ? "active" : "" }}">
                                <a href="{{ route("admin.custodia-de-historias-clinicas.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.custodiaDeHistoriasClinica.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('pausas_activa_access')
                            <li class="{{ request()->is("admin/pausas-activas") || request()->is("admin/pausas-activas/*") ? "active" : "" }}">
                                <a href="{{ route("admin.pausas-activas.index") }}">
                                    <i class="fa-fw fas fa-male">

                                    </i>
                                    <span>{{ trans('cruds.pausasActiva.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('estilo_de_vida_saludable_access')
                            <li class="{{ request()->is("admin/estilo-de-vida-saludables") || request()->is("admin/estilo-de-vida-saludables/*") ? "active" : "" }}">
                                <a href="{{ route("admin.estilo-de-vida-saludables.index") }}">
                                    <i class="fa-fw fab fa-apple">

                                    </i>
                                    <span>{{ trans('cruds.estiloDeVidaSaludable.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('funcionario_access')
                <li class="{{ request()->is("admin/funcionarios") || request()->is("admin/funcionarios/*") ? "active" : "" }}">
                    <a href="{{ route("admin.funcionarios.index") }}">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.funcionario.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('asistencium_access')
                <li class="{{ request()->is("admin/asistencia") || request()->is("admin/asistencia/*") ? "active" : "" }}">
                    <a href="{{ route("admin.asistencia.index") }}">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.asistencium.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('user_alert_access')
                <li class="{{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "active" : "" }}">
                    <a href="{{ route("admin.user-alerts.index") }}">
                        <i class="fa-fw fas fa-bell">

                        </i>
                        <span>{{ trans('cruds.userAlert.title') }}</span>

                    </a>
                </li>
            @endcan
            @php($unread = \App\Models\QaTopic::unreadCount())
                <li class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "active" : "" }}">
                    <a href="{{ route("admin.messenger.index") }}">
                        <i class="fa-fw fa fa-envelope">

                        </i>
                        <span>{{ trans('global.messages') }}</span>
                        @if($unread > 0)
                            <strong>( {{ $unread }} )</strong>
                        @endif

                    </a>
                </li>
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="{{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}">
                            <a href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key">
                                </i>
                                {{ trans('global.change_password') }}
                            </a>
                        </li>
                    @endcan
                @endif
                <li>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <i class="fas fa-fw fa-sign-out-alt">

                        </i>
                        {{ trans('global.logout') }}
                    </a>
                </li>
        </ul>
    </section>
</aside>