<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()>
Partial Class DataBarang
    Inherits System.Windows.Forms.Form

    'Form overrides dispose to clean up the component list.
    <System.Diagnostics.DebuggerNonUserCode()>
    Protected Overrides Sub Dispose(ByVal disposing As Boolean)
        Try
            If disposing AndAlso components IsNot Nothing Then
                components.Dispose()
            End If
        Finally
            MyBase.Dispose(disposing)
        End Try
    End Sub

    'Required by the Windows Form Designer
    Private components As System.ComponentModel.IContainer

    'NOTE: The following procedure is required by the Windows Form Designer
    'It can be modified using the Windows Form Designer.  
    'Do not modify it using the code editor.
    <System.Diagnostics.DebuggerStepThrough()>
    Private Sub InitializeComponent()
        Dim DataGridViewCellStyle1 As System.Windows.Forms.DataGridViewCellStyle = New System.Windows.Forms.DataGridViewCellStyle()
        Dim DataGridViewCellStyle2 As System.Windows.Forms.DataGridViewCellStyle = New System.Windows.Forms.DataGridViewCellStyle()
        Dim DataGridViewCellStyle3 As System.Windows.Forms.DataGridViewCellStyle = New System.Windows.Forms.DataGridViewCellStyle()
        Dim DataGridViewCellStyle4 As System.Windows.Forms.DataGridViewCellStyle = New System.Windows.Forms.DataGridViewCellStyle()
        Me.GroupBox1 = New System.Windows.Forms.GroupBox()
        Me.dvgBarang = New Guna.UI2.WinForms.Guna2DataGridView()
        Me.TXT1 = New System.Windows.Forms.Label()
        Me.btnCari = New Guna.UI2.WinForms.Guna2Button()
        Me.txtkode = New Guna.UI2.WinForms.Guna2TextBox()
        Me.Label1 = New System.Windows.Forms.Label()
        Me.txtnama = New Guna.UI2.WinForms.Guna2TextBox()
        Me.btnRefres = New Guna.UI2.WinForms.Guna2Button()
        Me.GroupBox1.SuspendLayout()
        CType(Me.dvgBarang, System.ComponentModel.ISupportInitialize).BeginInit()
        Me.SuspendLayout()
        '
        'GroupBox1
        '
        Me.GroupBox1.Anchor = CType((((System.Windows.Forms.AnchorStyles.Top Or System.Windows.Forms.AnchorStyles.Bottom) _
            Or System.Windows.Forms.AnchorStyles.Left) _
            Or System.Windows.Forms.AnchorStyles.Right), System.Windows.Forms.AnchorStyles)
        Me.GroupBox1.Controls.Add(Me.btnRefres)
        Me.GroupBox1.Controls.Add(Me.Label1)
        Me.GroupBox1.Controls.Add(Me.txtnama)
        Me.GroupBox1.Controls.Add(Me.dvgBarang)
        Me.GroupBox1.Controls.Add(Me.TXT1)
        Me.GroupBox1.Controls.Add(Me.btnCari)
        Me.GroupBox1.Controls.Add(Me.txtkode)
        Me.GroupBox1.Location = New System.Drawing.Point(12, 12)
        Me.GroupBox1.Name = "GroupBox1"
        Me.GroupBox1.Size = New System.Drawing.Size(1299, 639)
        Me.GroupBox1.TabIndex = 6
        Me.GroupBox1.TabStop = False
        Me.GroupBox1.Text = "Data Pelanggan"
        '
        'dvgBarang
        '
        Me.dvgBarang.AllowUserToAddRows = False
        Me.dvgBarang.AllowUserToDeleteRows = False
        Me.dvgBarang.AllowUserToResizeRows = False
        DataGridViewCellStyle1.BackColor = System.Drawing.Color.White
        DataGridViewCellStyle1.Font = New System.Drawing.Font("Microsoft Sans Serif", 8.25!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        DataGridViewCellStyle1.ForeColor = System.Drawing.SystemColors.ControlText
        DataGridViewCellStyle1.SelectionBackColor = System.Drawing.Color.FromArgb(CType(CType(231, Byte), Integer), CType(CType(229, Byte), Integer), CType(CType(255, Byte), Integer))
        DataGridViewCellStyle1.SelectionForeColor = System.Drawing.Color.FromArgb(CType(CType(71, Byte), Integer), CType(CType(69, Byte), Integer), CType(CType(94, Byte), Integer))
        Me.dvgBarang.AlternatingRowsDefaultCellStyle = DataGridViewCellStyle1
        Me.dvgBarang.Anchor = CType((((System.Windows.Forms.AnchorStyles.Top Or System.Windows.Forms.AnchorStyles.Bottom) _
            Or System.Windows.Forms.AnchorStyles.Left) _
            Or System.Windows.Forms.AnchorStyles.Right), System.Windows.Forms.AnchorStyles)
        DataGridViewCellStyle2.Alignment = System.Windows.Forms.DataGridViewContentAlignment.MiddleLeft
        DataGridViewCellStyle2.BackColor = System.Drawing.Color.Blue
        DataGridViewCellStyle2.Font = New System.Drawing.Font("Microsoft Sans Serif", 8.25!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        DataGridViewCellStyle2.ForeColor = System.Drawing.Color.White
        DataGridViewCellStyle2.SelectionBackColor = System.Drawing.Color.Blue
        DataGridViewCellStyle2.SelectionForeColor = System.Drawing.SystemColors.HighlightText
        DataGridViewCellStyle2.WrapMode = System.Windows.Forms.DataGridViewTriState.[True]
        Me.dvgBarang.ColumnHeadersDefaultCellStyle = DataGridViewCellStyle2
        Me.dvgBarang.ColumnHeadersHeight = 21
        Me.dvgBarang.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.EnableResizing
        DataGridViewCellStyle3.Alignment = System.Windows.Forms.DataGridViewContentAlignment.MiddleLeft
        DataGridViewCellStyle3.BackColor = System.Drawing.Color.White
        DataGridViewCellStyle3.Font = New System.Drawing.Font("Microsoft Sans Serif", 8.25!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        DataGridViewCellStyle3.ForeColor = System.Drawing.SystemColors.ControlText
        DataGridViewCellStyle3.SelectionBackColor = System.Drawing.Color.FromArgb(CType(CType(231, Byte), Integer), CType(CType(229, Byte), Integer), CType(CType(255, Byte), Integer))
        DataGridViewCellStyle3.SelectionForeColor = System.Drawing.Color.FromArgb(CType(CType(71, Byte), Integer), CType(CType(69, Byte), Integer), CType(CType(94, Byte), Integer))
        DataGridViewCellStyle3.WrapMode = System.Windows.Forms.DataGridViewTriState.[False]
        Me.dvgBarang.DefaultCellStyle = DataGridViewCellStyle3
        Me.dvgBarang.GridColor = System.Drawing.Color.FromArgb(CType(CType(231, Byte), Integer), CType(CType(229, Byte), Integer), CType(CType(255, Byte), Integer))
        Me.dvgBarang.Location = New System.Drawing.Point(6, 163)
        Me.dvgBarang.Name = "dvgBarang"
        Me.dvgBarang.ReadOnly = True
        Me.dvgBarang.RowHeadersBorderStyle = System.Windows.Forms.DataGridViewHeaderBorderStyle.None
        DataGridViewCellStyle4.Alignment = System.Windows.Forms.DataGridViewContentAlignment.MiddleLeft
        DataGridViewCellStyle4.BackColor = System.Drawing.Color.White
        DataGridViewCellStyle4.Font = New System.Drawing.Font("Microsoft Sans Serif", 8.25!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        DataGridViewCellStyle4.ForeColor = System.Drawing.SystemColors.WindowText
        DataGridViewCellStyle4.SelectionBackColor = System.Drawing.Color.White
        DataGridViewCellStyle4.SelectionForeColor = System.Drawing.SystemColors.HighlightText
        DataGridViewCellStyle4.WrapMode = System.Windows.Forms.DataGridViewTriState.[True]
        Me.dvgBarang.RowHeadersDefaultCellStyle = DataGridViewCellStyle4
        Me.dvgBarang.RowHeadersVisible = False
        Me.dvgBarang.Size = New System.Drawing.Size(1287, 470)
        Me.dvgBarang.TabIndex = 4
        Me.dvgBarang.ThemeStyle.AlternatingRowsStyle.BackColor = System.Drawing.Color.White
        Me.dvgBarang.ThemeStyle.AlternatingRowsStyle.Font = New System.Drawing.Font("Microsoft Sans Serif", 8.25!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.dvgBarang.ThemeStyle.AlternatingRowsStyle.ForeColor = System.Drawing.SystemColors.ControlText
        Me.dvgBarang.ThemeStyle.AlternatingRowsStyle.SelectionBackColor = System.Drawing.Color.FromArgb(CType(CType(231, Byte), Integer), CType(CType(229, Byte), Integer), CType(CType(255, Byte), Integer))
        Me.dvgBarang.ThemeStyle.AlternatingRowsStyle.SelectionForeColor = System.Drawing.Color.FromArgb(CType(CType(71, Byte), Integer), CType(CType(69, Byte), Integer), CType(CType(94, Byte), Integer))
        Me.dvgBarang.ThemeStyle.BackColor = System.Drawing.Color.White
        Me.dvgBarang.ThemeStyle.GridColor = System.Drawing.Color.FromArgb(CType(CType(231, Byte), Integer), CType(CType(229, Byte), Integer), CType(CType(255, Byte), Integer))
        Me.dvgBarang.ThemeStyle.HeaderStyle.BackColor = System.Drawing.Color.Blue
        Me.dvgBarang.ThemeStyle.HeaderStyle.BorderStyle = System.Windows.Forms.DataGridViewHeaderBorderStyle.None
        Me.dvgBarang.ThemeStyle.HeaderStyle.Font = New System.Drawing.Font("Segoe UI", 10.5!)
        Me.dvgBarang.ThemeStyle.HeaderStyle.ForeColor = System.Drawing.Color.White
        Me.dvgBarang.ThemeStyle.HeaderStyle.HeaightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.EnableResizing
        Me.dvgBarang.ThemeStyle.HeaderStyle.Height = 21
        Me.dvgBarang.ThemeStyle.ReadOnly = True
        Me.dvgBarang.ThemeStyle.RowsStyle.BackColor = System.Drawing.Color.White
        Me.dvgBarang.ThemeStyle.RowsStyle.BorderStyle = System.Windows.Forms.DataGridViewCellBorderStyle.SingleHorizontal
        Me.dvgBarang.ThemeStyle.RowsStyle.Font = New System.Drawing.Font("Segoe UI", 10.5!)
        Me.dvgBarang.ThemeStyle.RowsStyle.ForeColor = System.Drawing.Color.FromArgb(CType(CType(71, Byte), Integer), CType(CType(69, Byte), Integer), CType(CType(94, Byte), Integer))
        Me.dvgBarang.ThemeStyle.RowsStyle.Height = 22
        Me.dvgBarang.ThemeStyle.RowsStyle.SelectionBackColor = System.Drawing.Color.FromArgb(CType(CType(231, Byte), Integer), CType(CType(229, Byte), Integer), CType(CType(255, Byte), Integer))
        Me.dvgBarang.ThemeStyle.RowsStyle.SelectionForeColor = System.Drawing.Color.FromArgb(CType(CType(71, Byte), Integer), CType(CType(69, Byte), Integer), CType(CType(94, Byte), Integer))
        '
        'TXT1
        '
        Me.TXT1.AutoSize = True
        Me.TXT1.BackColor = System.Drawing.Color.Transparent
        Me.TXT1.Font = New System.Drawing.Font("Microsoft Sans Serif", 12.25!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.TXT1.Location = New System.Drawing.Point(2, 30)
        Me.TXT1.Name = "TXT1"
        Me.TXT1.Size = New System.Drawing.Size(106, 20)
        Me.TXT1.TabIndex = 0
        Me.TXT1.Text = "Kode Barang"
        '
        'btnCari
        '
        Me.btnCari.BackColor = System.Drawing.SystemColors.HotTrack
        Me.btnCari.DisabledState.BorderColor = System.Drawing.Color.DarkGray
        Me.btnCari.DisabledState.CustomBorderColor = System.Drawing.Color.DarkGray
        Me.btnCari.DisabledState.FillColor = System.Drawing.Color.FromArgb(CType(CType(169, Byte), Integer), CType(CType(169, Byte), Integer), CType(CType(169, Byte), Integer))
        Me.btnCari.DisabledState.ForeColor = System.Drawing.Color.FromArgb(CType(CType(141, Byte), Integer), CType(CType(141, Byte), Integer), CType(CType(141, Byte), Integer))
        Me.btnCari.FillColor = System.Drawing.Color.MediumBlue
        Me.btnCari.Font = New System.Drawing.Font("Segoe UI", 9.0!)
        Me.btnCari.ForeColor = System.Drawing.Color.White
        Me.btnCari.Location = New System.Drawing.Point(6, 95)
        Me.btnCari.Name = "btnCari"
        Me.btnCari.Size = New System.Drawing.Size(157, 42)
        Me.btnCari.TabIndex = 2
        Me.btnCari.Text = "Cari"
        '
        'txtkode
        '
        Me.txtkode.Cursor = System.Windows.Forms.Cursors.IBeam
        Me.txtkode.DefaultText = ""
        Me.txtkode.DisabledState.BorderColor = System.Drawing.Color.FromArgb(CType(CType(208, Byte), Integer), CType(CType(208, Byte), Integer), CType(CType(208, Byte), Integer))
        Me.txtkode.DisabledState.FillColor = System.Drawing.Color.FromArgb(CType(CType(226, Byte), Integer), CType(CType(226, Byte), Integer), CType(CType(226, Byte), Integer))
        Me.txtkode.DisabledState.ForeColor = System.Drawing.Color.FromArgb(CType(CType(138, Byte), Integer), CType(CType(138, Byte), Integer), CType(CType(138, Byte), Integer))
        Me.txtkode.DisabledState.PlaceholderForeColor = System.Drawing.Color.FromArgb(CType(CType(138, Byte), Integer), CType(CType(138, Byte), Integer), CType(CType(138, Byte), Integer))
        Me.txtkode.FocusedState.BorderColor = System.Drawing.Color.FromArgb(CType(CType(94, Byte), Integer), CType(CType(148, Byte), Integer), CType(CType(255, Byte), Integer))
        Me.txtkode.Font = New System.Drawing.Font("Segoe UI", 9.0!)
        Me.txtkode.ForeColor = System.Drawing.Color.Black
        Me.txtkode.HoverState.BorderColor = System.Drawing.Color.FromArgb(CType(CType(94, Byte), Integer), CType(CType(148, Byte), Integer), CType(CType(255, Byte), Integer))
        Me.txtkode.Location = New System.Drawing.Point(6, 53)
        Me.txtkode.Name = "txtkode"
        Me.txtkode.PasswordChar = Global.Microsoft.VisualBasic.ChrW(0)
        Me.txtkode.PlaceholderText = ""
        Me.txtkode.SelectedText = ""
        Me.txtkode.Size = New System.Drawing.Size(632, 36)
        Me.txtkode.TabIndex = 3
        '
        'Label1
        '
        Me.Label1.AutoSize = True
        Me.Label1.BackColor = System.Drawing.Color.Transparent
        Me.Label1.Font = New System.Drawing.Font("Microsoft Sans Serif", 12.25!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.Label1.Location = New System.Drawing.Point(640, 30)
        Me.Label1.Margin = New System.Windows.Forms.Padding(0, 0, 0, 0)
        Me.Label1.Name = "Label1"
        Me.Label1.Size = New System.Drawing.Size(112, 20)
        Me.Label1.TabIndex = 5
        Me.Label1.Text = "Nama Barang"
        '
        'txtnama
        '
        Me.txtnama.Cursor = System.Windows.Forms.Cursors.IBeam
        Me.txtnama.DefaultText = ""
        Me.txtnama.DisabledState.BorderColor = System.Drawing.Color.FromArgb(CType(CType(208, Byte), Integer), CType(CType(208, Byte), Integer), CType(CType(208, Byte), Integer))
        Me.txtnama.DisabledState.FillColor = System.Drawing.Color.FromArgb(CType(CType(226, Byte), Integer), CType(CType(226, Byte), Integer), CType(CType(226, Byte), Integer))
        Me.txtnama.DisabledState.ForeColor = System.Drawing.Color.FromArgb(CType(CType(138, Byte), Integer), CType(CType(138, Byte), Integer), CType(CType(138, Byte), Integer))
        Me.txtnama.DisabledState.PlaceholderForeColor = System.Drawing.Color.FromArgb(CType(CType(138, Byte), Integer), CType(CType(138, Byte), Integer), CType(CType(138, Byte), Integer))
        Me.txtnama.FocusedState.BorderColor = System.Drawing.Color.FromArgb(CType(CType(94, Byte), Integer), CType(CType(148, Byte), Integer), CType(CType(255, Byte), Integer))
        Me.txtnama.Font = New System.Drawing.Font("Segoe UI", 9.0!)
        Me.txtnama.ForeColor = System.Drawing.Color.Black
        Me.txtnama.HoverState.BorderColor = System.Drawing.Color.FromArgb(CType(CType(94, Byte), Integer), CType(CType(148, Byte), Integer), CType(CType(255, Byte), Integer))
        Me.txtnama.Location = New System.Drawing.Point(644, 53)
        Me.txtnama.Name = "txtnama"
        Me.txtnama.PasswordChar = Global.Microsoft.VisualBasic.ChrW(0)
        Me.txtnama.PlaceholderText = ""
        Me.txtnama.SelectedText = ""
        Me.txtnama.Size = New System.Drawing.Size(632, 36)
        Me.txtnama.TabIndex = 6
        '
        'btnRefres
        '
        Me.btnRefres.BackColor = System.Drawing.SystemColors.HotTrack
        Me.btnRefres.DisabledState.BorderColor = System.Drawing.Color.DarkGray
        Me.btnRefres.DisabledState.CustomBorderColor = System.Drawing.Color.DarkGray
        Me.btnRefres.DisabledState.FillColor = System.Drawing.Color.FromArgb(CType(CType(169, Byte), Integer), CType(CType(169, Byte), Integer), CType(CType(169, Byte), Integer))
        Me.btnRefres.DisabledState.ForeColor = System.Drawing.Color.FromArgb(CType(CType(141, Byte), Integer), CType(CType(141, Byte), Integer), CType(CType(141, Byte), Integer))
        Me.btnRefres.FillColor = System.Drawing.Color.MediumBlue
        Me.btnRefres.Font = New System.Drawing.Font("Segoe UI", 9.0!)
        Me.btnRefres.ForeColor = System.Drawing.Color.White
        Me.btnRefres.Location = New System.Drawing.Point(179, 95)
        Me.btnRefres.Name = "btnRefres"
        Me.btnRefres.Size = New System.Drawing.Size(157, 42)
        Me.btnRefres.TabIndex = 7
        Me.btnRefres.Text = "Refres"
        '
        'DataBarang
        '
        Me.AutoScaleDimensions = New System.Drawing.SizeF(6.0!, 13.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.BackColor = System.Drawing.SystemColors.ActiveCaption
        Me.ClientSize = New System.Drawing.Size(1323, 663)
        Me.Controls.Add(Me.GroupBox1)
        Me.FormBorderStyle = System.Windows.Forms.FormBorderStyle.None
        Me.MaximizeBox = False
        Me.MinimizeBox = False
        Me.MinimumSize = New System.Drawing.Size(400, 217)
        Me.Name = "DataBarang"
        Me.ShowIcon = False
        Me.ShowInTaskbar = False
        Me.Text = "Form3"
        Me.WindowState = System.Windows.Forms.FormWindowState.Maximized
        Me.GroupBox1.ResumeLayout(False)
        Me.GroupBox1.PerformLayout()
        CType(Me.dvgBarang, System.ComponentModel.ISupportInitialize).EndInit()
        Me.ResumeLayout(False)

    End Sub
    Friend WithEvents GroupBox1 As System.Windows.Forms.GroupBox
    Friend WithEvents dvgBarang As Guna.UI2.WinForms.Guna2DataGridView
    Friend WithEvents TXT1 As System.Windows.Forms.Label
    Friend WithEvents btnCari As Guna.UI2.WinForms.Guna2Button
    Friend WithEvents txtkode As Guna.UI2.WinForms.Guna2TextBox
    Friend WithEvents Label1 As Label
    Friend WithEvents txtnama As Guna.UI2.WinForms.Guna2TextBox
    Friend WithEvents btnRefres As Guna.UI2.WinForms.Guna2Button
End Class
