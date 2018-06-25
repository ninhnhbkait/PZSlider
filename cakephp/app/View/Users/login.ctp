<form method="post" action=""> 
    <fieldset> 
    <legend>Đăng nhập</legend> 
    <label>Tên đăng nhập</label><input type="text" name="username" /><br /> 
    <label>Mật khẩu</label><input type="password" name="password" /><br /> 
    <label>&nbsp;</label><input type="submit" name="ok" value="Login" />
    <span class="error"><?php echo $error; ?></span>
    </fieldset> 
</form>