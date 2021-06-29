using System;
using System.Collections;
using System.Collections.Generic;
using System.Linq;
using System.Runtime.Serialization;
using System.Text;
using System.Threading.Tasks;

namespace Interfacez
{

    public interface IResult
    {

        int page { get; set; }
        int totalpages { get; set; }
        int items { get; set; }
        int totalItems { get; set; }
        IList Lista { get; set; }
        string error { get; set; }
    }
}
