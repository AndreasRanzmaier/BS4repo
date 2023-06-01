using WebApi2.Model;
using Microsoft.EntityFrameworkCore;

var builder = WebApplication.CreateBuilder(args);

// Add services to the container.

builder.Services.AddControllers();
// Learn more about configuring Swagger/OpenAPI at https://aka.ms/aspnetcore/swashbuckle
builder.Services.AddEndpointsApiExplorer();
builder.Services.AddSwaggerGen();

builder.Services.AddDbContext<DBSchoolContext>(
    options => options.UseMySQL(builder.Configuration.GetConnectionString("SchoolDB"))
    );

// zugriffsfreigabe für unserem frontend server
var tmpCors = "cross";
builder.Services.AddCors(options =>
{
    options.AddPolicy(tmpCors, bilder => bilder.AllowAnyOrigin().AllowAnyMethod().AllowAnyHeader());
});

var app = builder.Build();

// Configure the HTTP request pipeline.
if (app.Environment.IsDevelopment())
{
    app.UseSwagger();
    app.UseSwaggerUI();
}

app.UseCors(tmpCors);

app.UseAuthorization();

app.MapControllers();

app.Run();
