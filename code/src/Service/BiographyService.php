<?php

namespace App\Service;

use App\Model\Biography;

class BiographyService
{
    public function getBiography(): Biography
    {
        return (new Biography())
            ->setLng('la')
            ->setContent("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ut dignissim augue, vel lobortis eros. Fusce mollis placerat arcu. Ut sed lectus ac lectus pharetra porta in vitae erat. Pellentesque interdum mattis sodales. Nam eu sem congue, facilisis purus id, congue dui. Phasellus neque massa, consequat id ullamcorper in, malesuada id nunc. In et egestas leo. Sed eget nulla consectetur, congue nibh ut, bibendum ex. Proin ut magna ipsum. Nulla non pellentesque sapien, interdum consequat purus. Praesent rhoncus suscipit mi, non vulputate felis dictum ut. Vivamus ac lobortis est, ac sagittis nisl. Fusce venenatis sit amet nibh eu vehicula.

    Sed sollicitudin urna eget aliquet lobortis. Pellentesque maximus erat vitae luctus sagittis. Nam scelerisque leo nec odio interdum cursus. Quisque ut mi in tortor iaculis blandit a vel leo. Duis vehicula bibendum odio, gravida pulvinar ex semper in. Etiam rhoncus libero est, sed rhoncus mauris rutrum quis. Praesent purus diam, porta non laoreet id, sagittis sed tellus. Aliquam a enim at erat ultricies molestie. Phasellus sollicitudin ut ex sed pellentesque. Ut fringilla lorem lorem, id interdum ante vehicula eu. Phasellus tristique diam id odio imperdiet suscipit. Nam pellentesque lectus in metus porttitor, ac hendrerit magna sagittis. Integer porttitor porttitor hendrerit. Vivamus ac semper ipsum, tempus efficitur odio.

    Mauris vitae posuere justo, nec consectetur justo. In hac habitasse platea dictumst. Curabitur vel tincidunt ligula. Integer eu magna lobortis sapien pretium porttitor nec in libero. Duis aliquam, ligula eget dictum varius, eros orci tempus dolor, at iaculis sapien risus eget erat. Mauris purus ligula, fermentum ut quam sed, dictum ornare nulla. Phasellus id lectus dignissim, molestie dolor a, maximus enim.

    Sed in finibus elit. Etiam eget nisl vitae nulla aliquet ornare ac quis turpis. Vivamus hendrerit dolor nec dolor dictum fermentum. Aliquam varius sem a ligula gravida, ut rhoncus ante pellentesque. Fusce non urna sapien. Proin molestie odio vitae faucibus tempor. Nullam tincidunt tortor nunc, at mollis nisl euismod in. Pellentesque diam eros, cursus sed dapibus eu, rhoncus nec urna. Donec felis sapien, hendrerit eu molestie quis, consectetur eu est.

    In rutrum et mauris ac viverra. Maecenas at nunc neque. Suspendisse maximus augue et nisi condimentum, et venenatis turpis ullamcorper. Quisque felis sapien, efficitur nec elit quis, mollis euismod augue. Ut lacus turpis, vulputate in augue vitae, egestas vehicula tellus. Donec tristique id dolor eget elementum. Vivamus tincidunt ex lorem, vitae sagittis dolor vestibulum eu. Integer sed volutpat velit, sit amet suscipit risus. Quisque porttitor ullamcorper felis nec sollicitudin. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus quis risus massa. Nullam id varius lacus."
            );
    }
}
