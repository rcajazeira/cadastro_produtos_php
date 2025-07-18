<?php
/**
 * includes/session.php
 *
 * Este arquivo é responsável por iniciar ou retomar a sessão PHP.
 * Deve ser incluído no início de qualquer script que precise acessar
 * ou manipular variáveis de sessão (e.g., $_SESSION).
 */

// Verifica se a sessão já foi iniciada para evitar erros.
// session_status() está disponível a partir do PHP 5.4.0.
// PHP_SESSION_NONE: Não há sessão ativa.
// PHP_SESSION_ACTIVE: Há uma sessão ativa.
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// =====================================================================
// Abaixo, algumas configurações ou lógicas comuns de sessão (opcional):
// =====================================================================

// 1. Configurações de cookie de sessão (para maior segurança)
// session_set_cookie_params(
//     0,          // Tempo de vida do cookie (0 = até o navegador fechar)
//     '/',        // Caminho (disponível em todo o site)
//     '',         // Domínio (deixe vazio para o domínio atual)
//     isset($_SERVER["HTTPS"]), // Apenas HTTPS (true se o site for HTTPS)
//     true        // HttpOnly (o cookie só pode ser acessado via HTTP/S, não por JavaScript)
// );

// 2. Definir o tempo máximo de vida da sessão no servidor (em segundos)
// ini_set('session.gc_maxlifetime', 1440); // 1440 segundos = 24 minutos

// 3. Lógica para "Flash Messages" (mensagens que aparecem uma vez e depois somem)
// Você pode usar isso para mensagens de sucesso/erro que redirecionam.
// Exemplo: No add_product.php, você faria: $_SESSION['flash_message'] = 'Produto adicionado!';
// E aqui, você recuperaria e limparia:
/*
if (isset($_SESSION['flash_message'])) {
    $flash_message = $_SESSION['flash_message'];
    unset($_SESSION['flash_message']); // Remove a mensagem após exibi-la
}
*/
// Nas páginas onde você quer exibir a flash message, você faria:
// if (isset($flash_message)) { echo '<div class="message success">' . $flash_message . '</div>'; }

// 4. Verificação de autenticação (se houver um sistema de login futuro)
/*
if (!isset($_SESSION['user_id']) && !basename($_SERVER['PHP_SELF']) == 'login.php') {
    // Redirecionar para a página de login se o usuário não estiver logado
    // e não estiver já na página de login
    header('Location: login.php');
    exit();
}
*/

?>

