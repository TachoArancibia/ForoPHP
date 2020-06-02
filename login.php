<? 

if($varUsuario == null || $varUsuario == ''){
    echo "No tienes autorización para esta vista.". htmlspecialchars($_GET['id']);
}
?>