Imports Newtonsoft.Json
Imports System.Net
Imports System.Text
Imports Microsoft.VisualBasic
Imports System.Data

Module API
    Public URL As String = "http://127.0.0.1:8000"
    Public Email As String
    Public Password As String
    Public Token As String
    Public UserLevel As String

    Public Class RootObject
        Public Property databarang() As List(Of DataBrg)
    End Class
    Public Class UserObject
        Public Property datausr() As List(Of DataUsr)
    End Class
    Public Class DataUsr
        Public Property email() As Long
        Public Property token() As String
        Public Property userlevel() As String
    End Class
    Public Class JsonPost

        Private urlToPost As String = ""
        Public postResponse As String
        Public Sub New(ByVal urlToPost As String)
            Me.urlToPost = urlToPost
        End Sub
        Public Function postData(ByVal dictData As Dictionary(Of String, Object), ByVal actionData As String) As String
            Dim webClient As New WebClient()
            Dim resByte As Byte()
            Dim reqByte As Byte()
            Dim resString As String
            Dim reqString() As Byte

            Try
                webClient.Headers("content-type") = "application/json"
                reqString = Encoding.Default.GetBytes(JsonConvert.SerializeObject(dictData, Formatting.Indented))
                resByte = webClient.UploadData(Me.urlToPost, actionData, reqString)

                resString = Encoding.Default.GetString(resByte)

                webClient.Dispose()
                Return resString
            Catch ex As Exception
                Console.WriteLine(ex.Message)
            End Try
            Return False
        End Function
        Public Function getData() As String
            Dim webClient As New WebClient()
            Dim resByte As Byte()
            Dim reqByte As Byte()
            Dim resString As String
            Dim reqString() As Byte

            Try
                webClient.Headers("content-type") = "application/json"
                resByte = webClient.DownloadData(Me.urlToPost)
                resString = Encoding.Default.GetString(resByte)

                webClient.Dispose()
                Return resString
            Catch ex As Exception
                Console.WriteLine(ex.Message)
            End Try
            Return False
        End Function

    End Class
End Module
