<?php

use Symfony\Component\Routing\Matcher\Dumper\PhpMatcherTrait;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class srcApp_KernelDevDebugContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    use PhpMatcherTrait;

    public function __construct(RequestContext $context)
    {
        $this->context = $context;
        $this->staticRoutes = [
            '/authority' => [[['_route' => 'authority', '_controller' => 'App\\Controller\\AuthorityController::index'], null, null, null, false, false, null]],
            '/issue' => [[['_route' => 'issue', '_controller' => 'App\\Controller\\IssueController::index'], null, null, null, false, false, null]],
            '/item' => [[['_route' => 'item', '_controller' => 'App\\Controller\\ItemController::index'], null, null, null, false, false, null]],
            '/search' => [[['_route' => 'search', '_controller' => 'App\\Controller\\SearchController::index'], null, null, null, false, false, null]],
            '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
            '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
            '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
            '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
            '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
            '/' => [[['_route' => 'inicio', '_controller' => 'App\\Controller\\UserController::index'], null, null, null, false, false, null]],
            '/login' => [[['_route' => 'login', '_controller' => 'App\\Controller\\UserController::login'], null, null, null, false, false, null]],
            '/logout' => [[['_route' => 'logout'], null, null, null, false, false, null]],
            '/perfil' => [[['_route' => 'profile', '_controller' => 'App\\Controller\\UserController::profile'], null, null, null, false, false, null]],
            '/editar_perfil' => [[['_route' => 'edit_profile', '_controller' => 'App\\Controller\\UserController::edit_profile'], null, null, null, false, false, null]],
            '/delete_perfil' => [[['_route' => 'delete_profile', '_controller' => 'App\\Controller\\UserController::delete_profile'], null, null, null, false, false, null]],
            '/registro_usuario' => [[['_route' => 'register_user', '_controller' => 'App\\Controller\\UserController::register_user'], null, null, null, false, false, null]],
            '/register_book' => [[['_route' => 'register_book', '_controller' => 'App\\Controller\\CatalogueController::register_book'], null, null, null, false, false, null]],
            '/register_magazine' => [[['_route' => 'register_magazine', '_controller' => 'App\\Controller\\CatalogueController::register_magazine'], null, null, null, false, false, null]],
            '/buscar_ini' => [[['_route' => 'buscar_ini', '_controller' => 'App\\Controller\\AuthorityController::buscar_ini'], null, null, null, false, false, null]],
            '/autores' => [[['_route' => 'manage_authority', '_controller' => 'App\\Controller\\AuthorityController::index'], null, null, null, false, false, null]],
            '/new_author' => [[['_route' => 'new_author', '_controller' => 'App\\Controller\\AuthorityController::new_author'], null, null, null, false, false, null]],
            '/editar_borrar_autor' => [[['_route' => 'edit_delete_author', '_controller' => 'App\\Controller\\AuthorityController::edit_delete'], null, null, null, false, false, null]],
            '/buscar_autor' => [[['_route' => 'search_author', '_controller' => 'App\\Controller\\AuthorityController::search_author'], null, null, null, false, false, null]],
            '/catalogo' => [[['_route' => 'catalogue', '_controller' => 'App\\Controller\\CatalogueController::all_catalogue'], null, null, null, false, false, null]],
            '/buscar_nav' => [[['_route' => 'search_catalogue', '_controller' => 'App\\Controller\\SearchController::simpleSearch'], null, null, null, false, false, null]],
            '/buscar_catalogue' => [[['_route' => 'buscar_catalogue', '_controller' => 'App\\Controller\\CatalogueController::buscar'], null, null, null, false, false, null]],
            '/busqueda_personalizada' => [[['_route' => 'custom_search', '_controller' => 'App\\Controller\\SearchController::customSearch'], null, null, null, false, false, null]],
            '/buscar_item' => [[['_route' => 'item_maintenance', '_controller' => 'App\\Controller\\ItemController::buscar'], null, null, null, false, false, null]],
            '/buscar_issue' => [[['_route' => 'issue_maintenance', '_controller' => 'App\\Controller\\IssueController::buscar'], null, null, null, false, false, null]],
        ];
        $this->regexpList = [
            0 => '{^(?'
                    .'|/_(?'
                        .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                        .'|wdt/([^/]++)(*:57)'
                        .'|profiler/([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:102)'
                                .'|router(*:116)'
                                .'|exception(?'
                                    .'|(*:136)'
                                    .'|\\.css(*:149)'
                                .')'
                            .')'
                            .'|(*:159)'
                        .')'
                    .')'
                    .'|/e(?'
                        .'|dit(?'
                            .'|ar_(?'
                                .'|autor/([^/]++)(*:200)'
                                .'|i(?'
                                    .'|tem/([^/]++)(*:224)'
                                    .'|ssue/([^/]++)(*:245)'
                                .')'
                            .')'
                            .'|_catalogue/([^/]++)(*:274)'
                        .')'
                        .'|liminar_i(?'
                            .'|tem/([^/]++)(*:307)'
                            .'|ssue/([^/]++)(*:328)'
                        .')'
                    .')'
                    .'|/b(?'
                        .'|orrar_autor/([^/]++)(*:363)'
                        .'|uscar_autor/([^/]++)(*:391)'
                    .')'
                    .'|/select_buscar_autor/([^/]++)(*:429)'
                    .'|/delete_catalogue/([^/]++)(*:463)'
                    .'|/ver_(?'
                        .'|items/([^/]++)(*:493)'
                        .'|numeros/([^/]++)(*:517)'
                    .')'
                    .'|/crear_i(?'
                        .'|tem/([^/]++)(*:549)'
                        .'|ssue/([^/]++)(*:570)'
                    .')'
                .')/?$}sDu',
        ];
        $this->dynamicRoutes = [
            38 => [[['_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
            57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
            102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
            116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
            136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception::showAction'], ['token'], null, null, false, false, null]],
            149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception::cssAction'], ['token'], null, null, false, false, null]],
            159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
            200 => [[['_route' => 'edit_author', '_controller' => 'App\\Controller\\AuthorityController::edit'], ['id'], null, null, false, true, null]],
            224 => [[['_route' => 'edit_item', '_controller' => 'App\\Controller\\ItemController::edit_item'], ['id'], null, null, false, true, null]],
            245 => [[['_route' => 'edit_issue', '_controller' => 'App\\Controller\\IssueController::edit_issue'], ['id'], null, null, false, true, null]],
            274 => [[['_route' => 'edit_catalogue', '_controller' => 'App\\Controller\\CatalogueController::edit_catalogue'], ['id'], null, null, false, true, null]],
            307 => [[['_route' => 'delete_item', '_controller' => 'App\\Controller\\ItemController::delete_item'], ['id'], null, null, false, true, null]],
            328 => [[['_route' => 'delete_issue', '_controller' => 'App\\Controller\\IssueController::delete_issue'], ['id'], null, null, false, true, null]],
            363 => [[['_route' => 'delete_author', '_controller' => 'App\\Controller\\AuthorityController::delete'], ['id'], null, null, false, true, null]],
            391 => [[['_route' => 'buscar_autor', '_controller' => 'App\\Controller\\AuthorityController::buscar'], ['id'], null, null, false, true, null]],
            429 => [[['_route' => 'select_buscar_autor', '_controller' => 'App\\Controller\\AuthorityController::select_buscar_autor'], ['id'], null, null, false, true, null]],
            463 => [[['_route' => 'delete_catalogue', '_controller' => 'App\\Controller\\CatalogueController::delete_catalogue'], ['id'], null, null, false, true, null]],
            493 => [[['_route' => 'display_items', '_controller' => 'App\\Controller\\ItemController::display_items'], ['id'], null, null, false, true, null]],
            517 => [[['_route' => 'display_issues', '_controller' => 'App\\Controller\\IssueController::display_issues'], ['id'], null, null, false, true, null]],
            549 => [[['_route' => 'new_item', '_controller' => 'App\\Controller\\ItemController::create_item'], ['id'], null, null, false, true, null]],
            570 => [[['_route' => 'new_issue', '_controller' => 'App\\Controller\\IssueController::create_issue'], ['id'], null, null, false, true, null]],
        ];
    }
}
