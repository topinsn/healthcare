<style>
#sm li{
    list-style-type: none;
    display: inline-block;
    padding-left: 5px;
    /* flex: auto;
    flex-direction: row; */
}

#sm li a{
    text-decoration: none;
    color: #000;
    font-size: 20px;
    
}

#hrLine{
    color: #000;
    width: 450px; 
}
</style>

<!-- the footer starts here -->
<footer>
    <div class="mt-md-3">
        <div class=" mt-md-3">
            <div class="container-fluid" >
                <div class="row">
                    <div align="center">
                        <hr id="hrLine"/>
                    </div>
                
                    <div class="col-md-12  text-md-center">
                        <ul id="sm">
                            <i class="fa-brands fa-github"></i>
                            <li><a href="https://github.com/topinsn">Github</a></li>
                            
                            <i class="fa-brands fa-twitter"></i>
                            <li><a href="https://twitter.com/topinsn">Twiter</a></li>
                            <i class="fa-brands fa-linkedin"></i>
                            <li><a href="https://www.linkedin.com/in/topeoyelami/">LinkedIn</a></li>
                        </ul>

                        <span> All rights reserved. &copy; Qi-Wang <?php $year = 2022; echo $year?> - <?php $newYear = date('Y'); echo $newYear; ?> </span>
                    </div>
                </div>

            </div>
        </div>
    </div>

</footer>
<!-- the footer ends here -->
</body>
</html>