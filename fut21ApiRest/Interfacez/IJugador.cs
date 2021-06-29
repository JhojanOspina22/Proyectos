using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Interfacez
{
    public interface IJugador
    {
        int id { get; set; }
        string firstName { get; set; }
        string lastName { get; set; }
        string position { get; set; }
        string nacionality { get; set; }
        string club { get; set; }
    }
}
