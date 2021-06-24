using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;
using System.Web;
using System.Web.Mvc;
using Entidades;
using Logica;
namespace prueba.Controllers
{
    public class HomeController : Controller
    {
        public ActionResult Index()
        {

           var logica = new UsuarioLogica();

            return View(logica.GetUsuarios());
        }

        [HttpPost]      
        public ActionResult Index( HttpPostedFileBase archivo)
        {
          
            var logica = new UsuarioLogica();
            StreamReader sr = new StreamReader(archivo.InputStream);
            var csv= sr.ReadToEnd();
            foreach (string linea in csv.Split('\n'))
            {
                if (!string.IsNullOrEmpty(linea))
                {
                    var valores = linea.Split(',');

                    logica.CrearUsuarios(new Usuario
                    {
                        NombreCompleto = valores[0].Trim(),
                        Identificacion = valores[1].Trim(),
                        Telefono = valores[2].Trim(),
                        Direccion = valores[3].Trim(),
                        Ciudad = valores[4].Trim(),
                        Correo = valores[5].Trim(),
                    });
                }
            }
            sr.Close();
            
            return View(logica.GetUsuarios());
        }

        [HttpGet]
        public ActionResult EditarUsuario(int IdUsuario)
        {

            var logica = new UsuarioLogica();
            return View(logica.ListarUsuario(IdUsuario));
        }

        [HttpPost]
        public ActionResult EditarUsuario(Usuario u)
        {

            var logica = new UsuarioLogica();
            logica.ModificarUsuarios(u);
            return RedirectToAction("Index");
        }

        [HttpGet]
        public ActionResult EliminarUsuario(int IdUsuario)
        {

            var logica = new UsuarioLogica();
            logica.EliminarUsuarios(new Usuario
            {
                IdUsuario = IdUsuario

            }) ;
            return RedirectToAction("Index");
        }

        public ActionResult ExportarXls()
        {

            var logica = new UsuarioLogica();
            logica.ExportarXls(logica.GetUsuarios(), Response);
            return RedirectToAction("Index");
        }
        public FileResult ExportarCsv()
        {

            var logica = new UsuarioLogica();
          

            return File(Encoding.UTF8.GetBytes(logica.ExportarCsv(logica.GetUsuarios())), "text/csv", "Informe.csv");
        }

    }
}