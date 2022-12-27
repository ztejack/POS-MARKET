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

    'BARANG OBJECT
    Public Class RootObject
        Public Property databarang() As List(Of DataBrg)
    End Class

    'USERS OBJECT
    Public Class UserObject
        Public Property datausr() As List(Of DataUsr)
    End Class
    Public Class DataUsr
        Public msg As Boolean
        Public access_token As String
        Public email As String
        Public user_level As Integer
    End Class
    Public Class DataUsrErr
        Public status As Boolean
        Public msg As String
    End Class
    'Public Class DataUsr
    '    Public Property status() As Boolean
    '    Public Property email() As Long
    '    Public Property token() As String
    '    Public Property userlevel() As String
    'End Class
    Public Class UserError
        Public Property msg() As List(Of String)
        Public Property access_token() As List(Of String)
        Public Property email() As List(Of String)
        Public Property name() As List(Of String)
        Public Property user_level As List(Of String)
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
                'webClient.Headers("Authorization") = "Bearer {'" & Token & "'}"
                webClient.Headers.Add("Authorization", "Bearer " & Token)
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

Namespace Global.Utils
    Namespace Json
        Public Module modJson
            ''' <summary>
            ''' Serializes the specified value to Json
            ''' </summary>
            ''' <param name="value">The value to serialize</param> 
            ''' <param name="settings">The Newtonsoft.Json.JsonSerializerSettings used to serialize the object</param> 
            ''' <returns>The value serialized to Json</returns>
            Public Function Serialize(value As Object _
                                      , Optional settings As Newtonsoft.Json.JsonSerializerSettings = Nothing) As String
                If settings Is Nothing Then
                    settings = GetDefaultSettings()
                End If
                Return Newtonsoft.Json.JsonConvert.SerializeObject(value, settings)
            End Function

            ''' <summary>
            ''' Deserializes the specified value from Json to Object T
            ''' </summary>
            ''' <param name="value">The value to deserialize</param> 
            ''' <param name="settings">The Newtonsoft.Json.JsonSerializerSettings used to deserialize the object</param> 
            ''' <returns>The value deserialized to Object T</returns>
            Public Function Deserialize(Of T)(value As String _
                                              , Optional settings As Newtonsoft.Json.JsonSerializerSettings = Nothing) As T
                If settings Is Nothing Then
                    settings = GetDefaultSettings()
                End If
                Return Newtonsoft.Json.JsonConvert.DeserializeObject(Of T)(value, settings)
            End Function

            Private Function GetDefaultSettings() As Newtonsoft.Json.JsonSerializerSettings
                Static settings As New Newtonsoft.Json.JsonSerializerSettings With {
                    .Formatting = Newtonsoft.Json.Formatting.Indented
                }
                Return settings
            End Function
        End Module
    End Namespace
End Namespace
