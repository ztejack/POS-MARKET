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

    'End Sub


    Private Sub Form1_Load(sender As Object, e As EventArgs) Handles MyBase.Load
        TextBox1.Text = API.Email
        TextBox2.Text = API.Token

        Dim jsonpost As New JsonPost(URL & "/api/v1/product")
        Dim response As String = jsonpost.getData()
        Try
            Dim results As RootObject = JsonConvert.DeserializeObject(response, GetType(RootObject))

            dataResults = results.databarang.Select(Function(data) New DataBrg With {.kodePrd = data.kodePrd, .namaPrd = data.namaPrd, .stok = data.stok, .satuan = data.satuan, .price = data.price, .modalprice = data.modalprice, .oldprice = data.oldprice, .updated_at = data.updated_at}).ToList
            dvgBarang.DataSource = dataResults
        Catch ex As Exception
            MessageBox.Show("make sure your database are connected")
        End Try

    End Sub

    Private Sub Guna2DataGridView1_CellContentClick(sender As Object, e As DataGridViewCellEventArgs)

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

    Private Sub TXT1_Click(sender As Object, e As EventArgs) Handles TXT1.Click

    End Sub

    Private Sub btn_Click(sender As Object, e As EventArgs) Handles btn.Click

    End Sub

    Private Sub dvgPelanggan_CellContentClick(sender As Object, e As DataGridViewCellEventArgs) Handles dvgBarang.CellContentClick

    End Sub

    Private Sub TextBox1_TextChanged(sender As Object, e As EventArgs) Handles TextBox1.TextChanged

    End Sub

    Private Sub TextBox2_TextChanged(sender As Object, e As EventArgs) Handles TextBox2.TextChanged

    End Sub
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

