<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class srcApp_KernelDevDebugContainerUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    private static $declaredRoutes;
    private $defaultLocale;

    public function __construct(RequestContext $context, LoggerInterface $logger = null, string $defaultLocale = null)
    {
        $this->context = $context;
        $this->logger = $logger;
        $this->defaultLocale = $defaultLocale;
        if (null === self::$declaredRoutes) {
            self::$declaredRoutes = [
        'authority' => [[], ['_controller' => 'App\\Controller\\AuthorityController::index'], [], [['text', '/authority']], [], []],
        'issue' => [[], ['_controller' => 'App\\Controller\\IssueController::index'], [], [['text', '/issue']], [], []],
        'item' => [[], ['_controller' => 'App\\Controller\\ItemController::index'], [], [['text', '/item']], [], []],
        'search' => [[], ['_controller' => 'App\\Controller\\SearchController::index'], [], [['text', '/search']], [], []],
        '_twig_error_test' => [['code', '_format'], ['_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], []],
        '_wdt' => [['token'], ['_controller' => 'web_profiler.controller.profiler::toolbarAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_wdt']], [], []],
        '_profiler_home' => [[], ['_controller' => 'web_profiler.controller.profiler::homeAction'], [], [['text', '/_profiler/']], [], []],
        '_profiler_search' => [[], ['_controller' => 'web_profiler.controller.profiler::searchAction'], [], [['text', '/_profiler/search']], [], []],
        '_profiler_search_bar' => [[], ['_controller' => 'web_profiler.controller.profiler::searchBarAction'], [], [['text', '/_profiler/search_bar']], [], []],
        '_profiler_phpinfo' => [[], ['_controller' => 'web_profiler.controller.profiler::phpinfoAction'], [], [['text', '/_profiler/phpinfo']], [], []],
        '_profiler_search_results' => [['token'], ['_controller' => 'web_profiler.controller.profiler::searchResultsAction'], [], [['text', '/search/results'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
        '_profiler_open_file' => [[], ['_controller' => 'web_profiler.controller.profiler::openAction'], [], [['text', '/_profiler/open']], [], []],
        '_profiler' => [['token'], ['_controller' => 'web_profiler.controller.profiler::panelAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
        '_profiler_router' => [['token'], ['_controller' => 'web_profiler.controller.router::panelAction'], [], [['text', '/router'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
        '_profiler_exception' => [['token'], ['_controller' => 'web_profiler.controller.exception::showAction'], [], [['text', '/exception'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
        '_profiler_exception_css' => [['token'], ['_controller' => 'web_profiler.controller.exception::cssAction'], [], [['text', '/exception.css'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
        'inicio' => [[], ['_controller' => 'App\\Controller\\UserController::index'], [], [['text', '/']], [], []],
        'login' => [[], ['_controller' => 'App\\Controller\\UserController::login'], [], [['text', '/login']], [], []],
        'logout' => [[], [], [], [['text', '/logout']], [], []],
        'profile' => [[], ['_controller' => 'App\\Controller\\UserController::profile'], [], [['text', '/perfil']], [], []],
        'edit_profile' => [[], ['_controller' => 'App\\Controller\\UserController::edit_profile'], [], [['text', '/editar_perfil']], [], []],
        'delete_profile' => [[], ['_controller' => 'App\\Controller\\UserController::delete_profile'], [], [['text', '/delete_perfil']], [], []],
        'register_user' => [[], ['_controller' => 'App\\Controller\\UserController::register_user'], [], [['text', '/registro_usuario']], [], []],
        'register_book' => [[], ['_controller' => 'App\\Controller\\CatalogueController::register_book'], [], [['text', '/register_book']], [], []],
        'register_magazine' => [[], ['_controller' => 'App\\Controller\\CatalogueController::register_magazine'], [], [['text', '/register_magazine']], [], []],
        'buscar_ini' => [[], ['_controller' => 'App\\Controller\\AuthorityController::buscar_ini'], [], [['text', '/buscar_ini']], [], []],
        'manage_authority' => [[], ['_controller' => 'App\\Controller\\AuthorityController::index'], [], [['text', '/autores']], [], []],
        'new_author' => [[], ['_controller' => 'App\\Controller\\AuthorityController::new_author'], [], [['text', '/new_author']], [], []],
        'edit_delete_author' => [[], ['_controller' => 'App\\Controller\\AuthorityController::edit_delete'], [], [['text', '/editar_borrar_autor']], [], []],
        'edit_author' => [['id'], ['_controller' => 'App\\Controller\\AuthorityController::edit'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/editar_autor']], [], []],
        'delete_author' => [['id'], ['_controller' => 'App\\Controller\\AuthorityController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/borrar_autor']], [], []],
        'search_author' => [[], ['_controller' => 'App\\Controller\\AuthorityController::search_author'], [], [['text', '/buscar_autor']], [], []],
        'buscar_autor' => [['id'], ['_controller' => 'App\\Controller\\AuthorityController::buscar'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/buscar_autor']], [], []],
        'select_buscar_autor' => [['id'], ['_controller' => 'App\\Controller\\AuthorityController::select_buscar_autor'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/select_buscar_autor']], [], []],
        'catalogue' => [[], ['_controller' => 'App\\Controller\\CatalogueController::all_catalogue'], [], [['text', '/catalogo']], [], []],
        'search_catalogue' => [[], ['_controller' => 'App\\Controller\\SearchController::simpleSearch'], [], [['text', '/buscar_nav']], [], []],
        'buscar_catalogue' => [[], ['_controller' => 'App\\Controller\\CatalogueController::buscar'], [], [['text', '/buscar_catalogue']], [], []],
        'custom_search' => [[], ['_controller' => 'App\\Controller\\SearchController::customSearch'], [], [['text', '/busqueda_personalizada']], [], []],
        'delete_catalogue' => [['id'], ['_controller' => 'App\\Controller\\CatalogueController::delete_catalogue'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/delete_catalogue']], [], []],
        'edit_catalogue' => [['id'], ['_controller' => 'App\\Controller\\CatalogueController::edit_catalogue'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/edit_catalogue']], [], []],
        'item_maintenance' => [[], ['_controller' => 'App\\Controller\\ItemController::buscar'], [], [['text', '/buscar_item']], [], []],
        'issue_maintenance' => [[], ['_controller' => 'App\\Controller\\IssueController::buscar'], [], [['text', '/buscar_issue']], [], []],
        'display_items' => [['id'], ['_controller' => 'App\\Controller\\ItemController::display_items'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/ver_items']], [], []],
        'display_issues' => [['id'], ['_controller' => 'App\\Controller\\IssueController::display_issues'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/ver_numeros']], [], []],
        'new_item' => [['id'], ['_controller' => 'App\\Controller\\ItemController::create_item'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/crear_item']], [], []],
        'new_issue' => [['id'], ['_controller' => 'App\\Controller\\IssueController::create_issue'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/crear_issue']], [], []],
        'edit_item' => [['id'], ['_controller' => 'App\\Controller\\ItemController::edit_item'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/editar_item']], [], []],
        'edit_issue' => [['id'], ['_controller' => 'App\\Controller\\IssueController::edit_issue'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/editar_issue']], [], []],
        'delete_item' => [['id'], ['_controller' => 'App\\Controller\\ItemController::delete_item'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/eliminar_item']], [], []],
        'delete_issue' => [['id'], ['_controller' => 'App\\Controller\\IssueController::delete_issue'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/eliminar_issue']], [], []],
    ];
        }
    }

    public function generate($name, $parameters = [], $referenceType = self::ABSOLUTE_PATH)
    {
        $locale = $parameters['_locale']
            ?? $this->context->getParameter('_locale')
            ?: $this->defaultLocale;

        if (null !== $locale && null !== $name) {
            do {
                if ((self::$declaredRoutes[$name.'.'.$locale][1]['_canonical_route'] ?? null) === $name) {
                    unset($parameters['_locale']);
                    $name .= '.'.$locale;
                    break;
                }
            } while (false !== $locale = strstr($locale, '_', true));
        }

        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens, $requiredSchemes) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens, $requiredSchemes);
    }
}
