
<div class="loader">
    <img src="images/load.gif">
</div>


<script>
    window.addEventListener("load", () => {
    const loader = document.querySelector(".loader");
    loader.classList.add("loader-hidden");

    loader.addEventListener("transitioned",() => {
        document.body.removeChild("loader");
    } )
})

</script>