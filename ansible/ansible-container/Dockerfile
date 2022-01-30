FROM centos:latest

ENV ANSIBLE_HOST_KEY_CHECKING False

RUN yum -y install openssh openssh-clients

RUN yum install -y epel-release
RUN yum install -y --enablerepo=epel python2-pip
RUN yum install -y ansible


WORKDIR /workdir

CMD /bin/bash