<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>cs460course finder</title>
</head>

<body>

<form id="form1" runat="server">
	<asp:DropDownList id="DropDownListMajor" runat="server" DataSourceID="SqlDataSource1" DataTextField="course_number" DataValueField="course_number">
	</asp:DropDownList>
	<asp:SqlDataSource ID="SqlDataSource1" runat="server" ConnectionString="Data Source=test-server-cs-460.database.windows.net;Initial Catalog=team1cs460;User ID=csadmin@test-server-cs-460;Password=cs4602017!" ProviderName="System.Data.SqlClient" SelectCommand="SELECT * FROM [CIS_major]">
	</asp:SqlDataSource>
</form>

</body>

</html>
