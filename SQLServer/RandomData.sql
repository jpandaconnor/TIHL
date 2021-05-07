Declare @Id int
Set @Id = (SELECT count(*) + 1 FROM users)

While @Id <= 100000
Begin
   Insert Into users values ('First Name: ' + CAST(@Id as nvarchar(10)),
              'Last Name: ' + CAST(@Id as nvarchar(10)))
   Print @Id
   Set @Id = @Id + 1
End