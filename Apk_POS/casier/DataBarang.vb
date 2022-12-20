Imports TheArtOfDevHtmlRenderer.Core
Imports System.Net
Imports System.Text
Imports Newtonsoft.Json
Imports Microsoft.VisualBasic.ApplicationServices
Imports System.Reflection.Emit
Imports System.Windows.Forms.VisualStyles.VisualStyleElement
Imports System.Windows.Forms.VisualStyles.VisualStyleElement.StartPanel
Imports Google.Protobuf.Reflection.FieldDescriptorProto.Types

Public Class DataBarang
    'Dim UserIndex As Integer
    'Dim UserName As String = ""
    'Dim UserEmail As String = ""
    'Dim UserId As String = ""

    Private dataResults As List(Of DataBrg) = New List(Of DataBrg)
    'Private Sub Button2_Click(sender As Object, e As EventArgs) Handles Button2.Click
    '    Dim jsonPost As New JsonPost(URL & "/api/users/" & UserId)
    '    Dim dictData As New Dictionary(Of String, Object)
    '    dictData.Add("name", TextBox1.Text)
    '    dictData.Add("email", TextBox2.Text)
    '    dictData.Add("password", TextBox3.Text)
    '    dictData.Add("password_confirmation", TextBox4.Text)
    '    Dim response As String = jsonPost.postData(dictData, "put")
    '    Label1.Text = response
    '    Try
    '        Dim results As Data = JsonConvert.DeserializeObject(response, GetType(Data))
    '        Dim row As Data = New Data With {.id = results.id, .name = results.name, .email = results.email, .created_at = results.created_at, .updated_at = results.updated_at}
    '        If results.id Then
    '            Dim dataCell As Data = dataResults.ElementAt(UserIndex)
    '            dataCell.name = results.name
    '            dataCell.email = results.email
    '            dataCell.created_at = results.created_at
    '            dataCell.updated_at = results.updated_at

    '            Dim UserBindingSource As New BindingSource
    '            UserBindingSource.DataSource = dataResults
    '            Guna2DataGridView1.DataSource = UserBindingSource
    '        End If
    '    Catch ex As Exception

    '    End Try
    'End Sub

    'Private Sub Button3_Click(sender As Object, e As EventArgs) Handles Button3.Click
    '    Dim jsonPost As New JsonPost(URL & "/api/users/" & UserId)
    '    Dim dictData As New Dictionary(Of String, Object)
    '    Dim response As String = jsonPost.postData(dictData, "delete")
    '    Try
    '        If True Then
    '            dataResults.RemoveAt(UserIndex)
    '            Dim UserBindingSource As New BindingSource
    '            UserBindingSource.DataSource = dataResults
    '            DataGridView1.DataSource = UserBindingSource
    '        End If
    '    Catch ex As Exception
    '        MessageBox.Show(ex.Message)
    '    End Try
    'End Sub

    Private Sub Form1_Load(sender As Object, e As EventArgs) Handles MyBase.Load
        Dim jsonpost As New JsonPost(URL & "/api/product")
        Dim response As String = jsonpost.getData()
        Try
            Dim results As RootObject = JsonConvert.DeserializeObject(response, GetType(RootObject))

            dataResults = results.databarang.Select(Function(data) New DataBrg With {.kodePrd = data.kodePrd, .namaPrd = data.namaPrd, .stok = data.stok, .satuan = data.satuan, .price = data.price, .modalprice = data.modalprice, .oldprice = data.oldprice, .updated_at = data.updated_at}).ToList
            Guna2DataGridView1.DataSource = dataResults
        Catch ex As Exception
            MessageBox.Show("make sure your database are connected")
        End Try

    End Sub

    'Private Sub Button1_Click(sender As Object, e As EventArgs) Handles Button1.Click
    '    Dim jsonPost As New JsonPost(URL & "/api/users/")
    '    Dim dictData As New Dictionary(Of String, Object)
    '    dictData.Add("name", TextBox1.Text)
    '    dictData.Add("email", TextBox2.Text)
    '    dictData.Add("password", TextBox3.Text)
    '    dictData.Add("password_confirmation", TextBox4.Text)
    '    Dim response As String = jsonPost.postData(dictData, "post")
    '    Label1.Text = response
    '    Try
    '        Dim results As Data = JsonConvert.DeserializeObject(response, GetType(Data))
    '        Dim row As Data = New Data With {.id = results.id, .Name = results.name, .Email = results.email, .created_at = results.created_at, .updated_at = results.updated_at}
    '        If results.id Then
    '            dataResults.Add(row)
    '            Dim UserBindingSource As New BindingSource
    '            UserBindingSource.DataSource = dataResults
    '            DataGridView1.DataSource = UserBindingSource
    '        End If
    '    Catch ex As Exception
    '        Dim ErrorResult As DataError = JsonConvert.DeserializeObject(response, GetType(DataError))
    '        Dim ErrorData As String
    '        If ErrorResult.email IsNot Nothing Then
    '            ErrorData += ErrorResult.email(0) & vbCrLf
    '        End If
    '        If ErrorResult.name IsNot Nothing Then
    '            ErrorData = ErrorResult.name(0) & vbCrLf
    '        End If
    '        If ErrorResult.password IsNot Nothing Then
    '            ErrorData += ErrorResult.password(0) & vbCrLf
    '        End If
    '        If ErrorResult.password_confirmation IsNot Nothing Then
    '            ErrorData += ErrorResult.password_confirmation(0) & vbCrLf
    '        End If
    '        MessageBox.Show(ErrorData)
    '    End Try
    'End Sub

    'Private Sub DataGridView1_CellContentClick(sender As Object, e As DataGridViewCellEventArgs) Handles DataGridView1.CellContentClick

    'End Sub

    'Private Sub DataGridView1_CellClick(sender As Object, e As DataGridViewCellEventArgs) Handles DataGridView1.CellClick
    '    Dim index As Integer
    '    index = e.RowIndex

    '    Dim selectedRow As DataGridViewRow

    '    ' display data from datagridview selected row to textboxes

    '    selectedRow = DataGridView1.Rows(index)

    '    TextBox1.Text = selectedRow.Cells(1).Value.ToString()
    '    TextBox2.Text = selectedRow.Cells(2).Value.ToString()
    '    UserIndex = index
    '    UserId = selectedRow.Cells(0).Value.ToString()
    '    UserName = selectedRow.Cells(1).Value.ToString()
    '    UserEmail = selectedRow.Cells(2).Value.ToString()
    'End Sub

    'Private Sub Guna2DataGridView1_CellContentClick(sender As Object, e As DataGridViewCellEventArgs) Handles Guna2DataGridView1.CellContentClick

    'End Sub
End Class
Public Class DataBrg
    Public Property kodePrd() As Long
    Public Property namaPrd() As String
    Public Property stok() As String
    Public Property satuan() As String
    Public Property price() As String
    Public Property modalprice() As String
    Public Property oldprice() As String
    Public Property updated_at() As Date
End Class
Public Class DataError
    Public Property email() As List(Of String)
    Public Property name() As List(Of String)
    Public Property password As List(Of String)
    Public Property password_confirmation As List(Of String)
End Class
