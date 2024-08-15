
<script type="text/javascript">
    // Désactiver le clic droit
    document.addEventListener("contextmenu", function(e){
        e.preventDefault();
    }, false);

    // Désactiver la sélection de texte
    document.addEventListener("selectstart", function(e){
        e.preventDefault();
    }, false);


    window.addEventListener("keydown", function(e) {
        if (e.key === "F12" || (e.ctrlKey && e.shiftKey && e.key === "I")) {
            e.preventDefault();
        }
    });

 
</script>
