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
    'Private dataResults As List(Of DataBrg) = New List(Of DataBrg)

    'End Sub


    'Private Sub Form1_Load(sender As Object, e As EventArgs) Handles MyBase.Load

    '    Dim jsonpost As New JsonPost(URL & "/api/v1/product")
    '    Dim response As String = jsonpost.getData()
    '    'Try
    '    Dim results As RootObject = JsonConvert.DeserializeObject(response, GetType(RootObject))

    '    dataResults = results.databarang.Select(Function(data) New DataBrg With {.id = data.id}).ToList
    '    '                                        .id = data.id,
    '    '                                        .kodePrd = data.kodePrd,
    '    '                                        .namaPrd = data.namaPrd,
    '    '                                        .stok = data.stok,
    '    '                                        .satuan = data.satuan,
    '    '                                        .price = data.price,
    '    '                                        .modalprice = data.modalprice,
    '    '                                        .oldprice = data.oldprice,
    '    '                                        .updated_at = data.updated_at,
    '    '                                        .created_at = data.created_at}).ToList
    '    'Catch ex As Exception
    '    '    MessageBox.Show("make sure your database are connected")
    '    'End Try

    'End Sub
    Public Class DataBrg
        Public Property ID() As Integer
        Public Property Kode_Barang() As Long
        Public Property Nama_Barang() As String
        Public Property Stok() As String
        Public Property Satuan() As String
        Public Property Harga() As String
    End Class

    Public Class RootObject
        Public Property data() As List(Of DataBrg)
    End Class
    Private dataResults As List(Of DataBrg) = New List(Of DataBrg)

    Private Sub Form1_Load(sender As Object, e As EventArgs) Handles MyBase.Load
        Dim jsonPost As New JsonPost(URL & "/api/v1/product")
        Dim response As String = jsonPost.getData()
        Try
            Dim results As RootObject = JsonConvert.DeserializeObject(response, GetType(RootObject))

            dataResults = results.data.Select(Function(data) New DataBrg With {.ID = data.ID, .Kode_Barang = data.Kode_Barang,
                                                .Nama_Barang = data.Nama_Barang,
                                                    .Stok = data.Stok,
                                                    .Satuan = data.Satuan,
                                                    .Harga = data.Harga}).ToList
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
        'Dim jsonPost As New JsonPost(URL & "/api/v1/product/search?kode=" & txtkode.Text)
        Dim jsonPost As New JsonPost(URL & "/api/v1/product/search")
        Dim dictData As New Dictionary(Of String, Object)
        dictData.Add("kode", txtkode.Text)
        Dim response As String = jsonPost.postData(dictData, "post")
        Console.WriteLine(response)
        Try
            Dim results As RootObject = JsonConvert.DeserializeObject(response, GetType(RootObject))

            dataResults = results.data.Select(Function(data) New DataBrg With {.ID = data.ID, .Kode_Barang = data.Kode_Barang,
                                                .Nama_Barang = data.Nama_Barang,
                                                    .Stok = data.Stok,
                                                    .Satuan = data.Satuan,
                                                    .Harga = data.Harga}).ToList
            dvgBarang.DataSource = dataResults
        Catch ex As Exception
            MessageBox.Show("make sure your database are connected")
        End Try
    End Sub

    Private Sub dvgPelanggan_CellContentClick(sender As Object, e As DataGridViewCellEventArgs) Handles dvgBarang.CellContentClick

    End Sub

    Private Sub Guna2DataGridView1_CellContentClick_1(sender As Object, e As DataGridViewCellEventArgs)

    End Sub

    Private Sub txtkode_TextChanged(sender As Object, e As EventArgs) Handles txtkode.TextChanged

    End Sub
End Class
'Public Class DataBrg

'    Public Property id() As Integer
'    Public Property kodePrd() As Long
'    Public Property namaPrd() As String
'    Public Property stok() As String
'    Public Property satuan() As String
'    Public Property price() As String
'    Public Property modalprice() As String
'    Public Property oldprice() As String
'    Public Property updated_at() As Date
'    Public Property created_at() As Date
'End Class
'Public Class Data
'    Public Property id() As Long
'    Public Property name() As String
'    Public Property email() As String
'    Public Property email_verified_at() As String
'    Public Property created_at() As Date
'    Public Property updated_at() As Date
'End Class

