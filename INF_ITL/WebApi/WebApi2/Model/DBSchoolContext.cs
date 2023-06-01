using Microsoft.EntityFrameworkCore;

namespace WebApi2.Model
{
    public class DBSchoolContext : DbContext
    {
        public DBSchoolContext(DbContextOptions<DBSchoolContext> options) : base(options)
        {
        }

        public DbSet<SchoolModel> School { get; set; }

        protected override void OnModelCreating(ModelBuilder builder)
        {
            base.OnModelCreating(builder);

            builder.Entity<SchoolModel>(entity =>
            {
                entity.HasKey(e => e.Id);
                entity.Property(e => e.Name).HasColumnType("VARCHAR").HasMaxLength(128).IsRequired();
            }
            );
        }
    }
}
