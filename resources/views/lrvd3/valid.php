<html>
	<head>
		<title>Validator | VinaEnter Edu</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="keywords" content="học php" />
		<meta name="description" content="học php" />
	</head>
	<body>
		<p>
			Dùng Validator của Laravel, kiểm tra tính hợp lệ dữ liệu người dùng nhập vào form theo yêu cầu sau:</p>			
		<p style="size:90%; font-style:italic">(*) Bắt buộc nhập</p>
		<form action="" method="POST">
			<table width="800px" border="1">
				<tr><td colspan="2"><p style="color:#E97D13; text-align:center">TRUNG TÂM ĐÀO TẠO LẬP TRÌNH VINAENTER</p></td></tr>
				<tr><td colspan="2"><p style="color:#E97D13"><b>Đăng ký thành viên, gian hàng</b></p></td></tr>
				<tr>
					<td width="152px" valign="top">Tên truy cập(*): </td>
					<td valign="top">
						<input type="text" value="" name="username" size="32" /><br />
						- Tên truy cập phải có ít nhất 6 ký tự, nhiều nhất 32 ký tự.
					</td>
				</tr>
				
				<tr>
					<td valign="top">Mật khẩu(*): </td>
					<td valign="top">
						<input type="password" value="" name="matkhau" size="32" /><br />
						- Mật khẩu phải có ít nhất 6 ký tự.
					</td>
				</tr>
				
				<tr>
					<td valign="top">Xác nhận mật khẩu(*): </td>
					<td valign="top">
						<input type="password" value="" name="rematkhau" size="44" /><br />
						- Xác nhận mật khẩu phải trùng với Mật khẩu ở trên
					</td>
				</tr>
				
				<tr>
					<td valign="top">Họ và tên(*): </td>
					<td valign="top">
						<input type="text" value="" name="hoten" size="44" />
					</td>
				</tr>
				
				<tr>
					<td valign="top">Email(*): </td>
					<td valign="top">
						<input type="text" value="" name="email" size="44" /><br />
						- Email phải đúng định dạng
					</td>
				</tr>
				
				<tr>
					<td valign="top">Xác nhận email: </td>
					<td valign="top">
						<input type="text" value="" name="reemail" size="44" /><br />
						- Xác nhận email phải trùng với Email đã nhập trên
					</td>
				</tr>
				
				<tr>
					<td valign="top">Giới tính(*): </td>
					<td valign="top">
						Nam <input type="radio" value="nam" name="gioitinh" />
						Nữ <input type="radio" value="nu" name="gioitinh" /><br />						
					</td>
				</tr>
				
				<tr>
					<td valign="top">Thành phố(*): </td>
					<td valign="top">
						<select name="thanhpho">
							<option value="">--[Chọn]--</option>
							<option value="danang">Đà Nẵng</option>
							<option value="hochiminh">Hồ Chí Minh</option>
							<option value="hanoi">Hà Nội</option>
						</select>
					</td>
				</tr>
				
				<tr>
					<td valign="top">Nick Yahoo: </td>
					<td valign="top">
						<input type="text" value="" name="yahoo" />
					</td>
				</tr>
				
				<tr>
					<td valign="top">Nick Skype(*): </td>
					<td valign="top">
						<input type="text" value="" name="skype" />
					</td>
				</tr>
				
				<tr>
					<td valign="top">Giới thiệu thành viên(*)</td>
					<td valign="top">
						<textarea rows="6" cols="80" name="gioithieu"></textarea>
					</td>
				</tr>
				
				<tr>
					<td valign="top">&nbsp;</td>
					<td valign="top">
						<input type="submit" value="Submit" name="submit" />
					</td>
				</tr>
				
			</table>
		</form>
	</body> 
</html> 