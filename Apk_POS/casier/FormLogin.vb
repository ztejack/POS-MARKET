'Imports System.Security.Policy
Imports Guna.UI2.WinForms
Imports System.Text
Imports Newtonsoft.Json
Imports System.Net
Imports System.Windows.Forms.VisualStyles.VisualStyleElement
Imports Newtonsoft.Json.Linq
Imports System.Security
Public Class FormLogin
    Dim UserIndex As Integer
    Private dataResults As List(Of DataUsr) = New List(Of DataUsr)

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
        If Me.InEmail.Text.Trim = "" Or
            Me.InPassword.Text.Trim = "" Then
            MsgBox("Username & Password Harus Diisi!", MsgBoxStyle.Exclamation, "Insufficient Data")
            Return True
        Else
            Return False
        End If
    End Function

    Private Sub CekUser()
        Try
            Dim jsonPost As New JsonPost(URL & "/api/v1/login")
            Dim dictData As New Dictionary(Of String, Object)
            dictData.Add("email", InEmail.Text)
            dictData.Add("password", InPassword.Text)
            Dim response As String = jsonPost.postDataLogin(dictData, "post")

            Try
                Dim results As DataUsr = JsonConvert.DeserializeObject(Of DataUsr)(response)
                Email = results.email
                Token = results.access_token
                UserLevel = results.user_level

                If UserLevel = 0 Then
                    Me.Hide()
                    InEmail.Text = ""
                    InPassword.Text = ""
                    MenuUtama.Show()

                ElseIf UserLevel = 1 Then
                    Me.Hide()
                    InEmail.Text = ""
                    InPassword.Text = ""
                    MenuUtama.Show()

                Else
                    MsgBox("Email '" & InEmail.Text & "' tidak memiliki akses", MsgBoxStyle.Exclamation, "Information")
                    InEmail.Text = ""
                    InPassword.Text = ""
                    LogOut()
                    InEmail.Select()
                End If

            Catch
                Dim results As DataUsrErr = JsonConvert.DeserializeObject(Of DataUsrErr)(response)
                MsgBox(results.msg, MsgBoxStyle.Exclamation, "Information")
            End Try
        Catch
            MessageBox.Show("make sure your database are connected")
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
