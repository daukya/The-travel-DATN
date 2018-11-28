                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="/">Dự án được phát triển bởi: Lê Nguyễn Thanh Tuyền</a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="https://www.facebook.com/dau.eyo">Facebook</a>
                </div>
            </div>
        </footer>


    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <!-- <script src="{{ $urlAdmin }}/js/jquery-1.10.2.js" type="text/javascript"></script> -->
     
    <script src="//cdn.ckeditor.com/4.9.0/full/ckeditor.js"></script>
	<script src="{{ $urlAdmin }}/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="{{ $urlAdmin }}/js/paper-dashboard.js"></script>
	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="{{ $urlAdmin }}/js/demo.js"></script>
    <!-- <script>
  var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
  };
</script> -->
    <script>
        CKEDITOR.replace( 'my-editor',options);
    </script>

</html>