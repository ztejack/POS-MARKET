'Imports System.Security.Policy
Imports Guna.UI2.WinForms
Imports System.Text
Imports Newtonsoft.Json
Imports System.Net
Imports System.Windows.Forms.VisualStyles.VisualStyleElement



Public Class FormLogin
    Private dataResults As List(Of DataUsr) = New List(Of DataUsr)
    'Private Sub btn_login_Click(sender As Object, e As EventArgs) Handles btn_login.Click
    '    If ValidasiEntry() = True Then
    '        InEmail.Select()
    '        Exit Sub
    '    End If

    '    Call conecDB()      'Open the connection to database
    '    Call initCMD()      'Initialize the sqlclient command object
    '    Call CekUser()
    'End Sub
    Private Sub btn_login_Click(sender As Object, e As EventArgs) Handles btn_login.Click
        If ValidasiEntry() = True Then
            InEmail.Select()
            Exit Sub
        End If
        Call CekUser()

    End Sub

    Private Sub btn_cancle_Click(sender As Object, e As EventArgs) Handles btn_cancle.Click
        Me.Close()
    End Sub
    Private Sub FormLogin_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        InPassword.Text = ""
        InEmail.Text = ""
        InEmail.Select()
    End Sub

    Private Function ValidasiEntry() As Boolean
        'Make sure that all fields have values
        If Me.InEmail.Text.Trim = "" Or
            Me.InPassword.Text.Trim = "" Then
            MsgBox("Username & Password Harus Diisi!", MsgBoxStyle.Exclamation, "Insufficient Data")
            Return True
        Else
            Return False
        End If
    End Function

    'Private Sub BtnOK_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btn_login.Click
    '    If ValidasiEntry() = True Then
    '        InEmail.Select()
    '        Exit Sub
    '    End If

    '    Call conecDB()      'Open the connection to database
    '    Call initCMD()      'Initialize the sqlclient command object
    '    Call CekUser()
    'End Sub

    'Load data user
    Private Sub CekUser()
        Try
            Dim jsonPost As New JsonPost(URL & "/api/login")
            Dim dictData As New Dictionary(Of String, Object)
            dictData.Add("email", InEmail.Text)
            dictData.Add("password", InPassword.Text)
            Dim response As String = jsonPost.postData(dictData, "post")
            'InEmail.Text = response
            'Try
            Dim results = JsonConvert.DeserializeObject(response, GetType(DataUsr))
                'Dim x = JsonConvert.DeserializeObject(Of response)(jsonData)
                'dataResults = results.datausr.Select(Function(data) New DataUsr With {.email = data.email, .userlevel = data.userlevel, .token = data.token}).ToList
                dataResults = results.datausr.Select(Function(data) New DataUsr With {.email = data.email, .userlevel = data.userlevel, .token = data.token})
                'Dim row As DataUsr = New DataUsr With {.email = results.email, .userlevel = results.userlevel, .token = results.token}
                Email = results.datausr.userlevel
                InEmail.Text = Email
                MsgBox(Email, MsgBoxStyle.Exclamation, "Information")

                If InEmail.Text = "" Or InPassword.Text = "" Then
                    MsgBox("Harap Isi Email dan Password anda", MsgBoxStyle.Exclamation, "Information")
                ElseIf response = True Then


                    MsgBox("Email  tidak memiliki akses", MsgBoxStyle.Exclamation, "Information")

                    'ElseIf rdDB.HasRows = True Then
                    If rdDB("level_id").ToString = "0" Then
                        Me.Hide()
                        MenuUtama.Show()

                        'FormStatus.Show()
                        'FormStatus.TXT1.Text = rdDB!name.ToString.Trim
                        'Dim password = BCrypt.Net.BCrypt.HashPassword("value")
                        'FormStatus.TXT2.Text = getMD5Hash(InPassword.Text)
                        'FormStatus.txt_nmbrg.Text = getMD5Hash(InPassword.Text)
                    ElseIf rdDB("level_id").ToString = "1" Then
                        Me.Hide()
                        MenuUtama.Show()

                        'FormStatus.Show()
                        'FormStatus.TXT1.Text = rdDB!name.ToString.Trim
                        'Dim password = BCrypt.Net.BCrypt.HashPassword("value")
                        'FormStatus.TXT2.Text = getMD5Hash(InPassword.Text)
                        'FormStatus.txt_nmbrg.Text = getMD5Hash(InPassword.Text)
                    Else
                        MsgBox("Email '" & InEmail.Text & "' tidak memiliki akses", MsgBoxStyle.Exclamation, "Information")
                        InEmail.Text = ""
                        InPassword.Text = ""
                        InEmail.Select()
                    End If

                ElseIf response = False Then
                    MsgBox("Email & password salah", MsgBoxStyle.Exclamation, "Information")
                    InEmail.Text = ""
                    InPassword.Text = ""
                    'InEmail.Select()
                End If
            'rdDB.Close()
            'Catch ex As Exception
            '    MessageBox.Show("make sure your database are connected")
            'End Try


        Catch ex As Exception
            MsgBox(ex.ToString)
        End Try
    End Sub

    Private Sub LoadData(ByVal sender As Object, ByVal e As System.Windows.Forms.KeyEventArgs) Handles InPassword.KeyDown
        If e.KeyCode = Keys.Enter Then
            ProcessTabKey(True) 'Move to next text box
        End If
    End Sub

    Private Sub InEmail_TextChanged(sender As Object, e As EventArgs) Handles InEmail.TextChanged

    End Sub

    Private Sub Label1_Click(sender As Object, e As EventArgs) Handles Label1.Click

    End Sub

    Private Sub InPassword_TextChanged(sender As Object, e As EventArgs) Handles InPassword.TextChanged

    End Sub
End Class
