using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using WebApi2.Model;

namespace WebApi2.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class SchoolController : ControllerBase
    {
        private DBSchoolContext dbCtx;

        public SchoolController(DBSchoolContext dbCtx)
        {
            this.dbCtx = dbCtx;
        }

        [HttpGet]
        public IEnumerable<SchoolModel> GetSchools()
        {
            return dbCtx.School;
        }

        [HttpGet("{id:int}")]
        public SchoolModel? GetSchools(int id)
        {
            return dbCtx.School.Where(x => x.Id == id).FirstOrDefault();
        }

        [HttpPut]
        public void UpdateSchools(int id, SchoolModel school)
        {
            SchoolModel? tmpFoundSchool = dbCtx.School.Where(x => x.Id == id).FirstOrDefault();

            if(tmpFoundSchool != null)
            {
                tmpFoundSchool.Id = id;
                tmpFoundSchool.Name = school.Name;
            }
            dbCtx.SaveChanges();
        }

        [HttpPost]
        public void CreateSchools(SchoolModel school)
        {
            // überprüfen ob id existiert
            dbCtx.School.Add(school);
            dbCtx.SaveChanges();

        }

        [HttpDelete]
        public void DeleteSchools(int id)
        {
            SchoolModel? tmpFoundSchool = dbCtx.School.Where(x => x.Id == id).FirstOrDefault();

            if (tmpFoundSchool != null)
            {
                dbCtx.School.Remove(tmpFoundSchool);
                dbCtx.SaveChanges();
            }
        }
    }
}