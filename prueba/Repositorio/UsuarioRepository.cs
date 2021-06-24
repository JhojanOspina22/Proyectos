using Entidades;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using Modelo;

namespace Repositorio
{
    public class UsuarioRepository
    {
        public List<Usuario> GetUsuarios()
        {
            using(var ctx= new pruebaContainer ())
            {
                return ctx.UsuarioSet.Select(u =>  new Usuario { 
                    IdUsuario=u.IdUsuario,
                    NombreCompleto=u.NombreCompleto,
                    Identificacion=u.Identificacion,
                    Telefono=u.Telefono,
                    Direccion=u.Direccion,
                    Ciudad=u.Ciudad,
                    Correo=u.Correo

                }).ToList();
            }
        }

        public Usuario ListarUsuario(int IdUsuario)
        {
            using (var ctx = new pruebaContainer())
            {
                return ctx.UsuarioSet.Select(u => new Usuario
                {
                    IdUsuario = u.IdUsuario,
                    NombreCompleto = u.NombreCompleto,
                    Identificacion = u.Identificacion,
                    Telefono = u.Telefono,
                    Direccion = u.Direccion,
                    Ciudad = u.Ciudad,
                    Correo = u.Correo

                }).FirstOrDefault(u => u.IdUsuario == IdUsuario);
            }
        }

        public bool CrearUsuarios(Usuario u)
        {
            using (var ctx = new pruebaContainer())
            {
             
                ctx.UsuarioSet.Add(new UsuarioSet
                {
                    IdUsuario=u.IdUsuario,
                    NombreCompleto=u.NombreCompleto,
                    Identificacion=u.Identificacion,
                    Telefono=u.Telefono,
                    Direccion=u.Direccion,
                    Ciudad=u.Ciudad,
                    Correo=u.Correo
                });
                ctx.SaveChanges();

                return true;
            }
        }

        public bool ModificarUsuarios(Usuario u)
        {
            using (var ctx = new pruebaContainer())
            {

                var usuario = ctx.UsuarioSet.FirstOrDefault(uu => uu.IdUsuario == u.IdUsuario);

                if (usuario == null)
                    return false;

                    usuario.NombreCompleto = u.NombreCompleto;
                    usuario.Identificacion = u.Identificacion;
                    usuario.Telefono = u.Telefono;
                    usuario.Direccion = u.Direccion;
                    usuario.Ciudad = u.Ciudad;
                    usuario.Correo = u.Correo;

                ctx.SaveChanges();

                return true;
            }
        }
        public bool EliminarUsuarios(Usuario u)
        {
            using (var ctx = new pruebaContainer())
            {

                var usuario = ctx.UsuarioSet.FirstOrDefault(uu => uu.IdUsuario == u.IdUsuario);

                if (usuario == null) return false;

                ctx.UsuarioSet.Remove(usuario);
                ctx.SaveChanges();

                return true;
            }
        }
    }
}
